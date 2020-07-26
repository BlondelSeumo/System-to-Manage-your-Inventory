<?php

namespace App\Http\Controllers\Backend\Inventory\Sales;

use App\Models\Common\Product;
use App\Models\Common\Tax;
use App\Models\Inventory\Sale;
use App\Models\Inventory\TransProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditSalesController extends Controller
{

    public $comp_code;
    public $user_id;

    /**
     * PurchaseController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->comp_code = Auth::guard('admin')->user()->company_id;
            $this->user_id = Auth::guard('admin')->user()->id;

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $sales = Sale::where('company_id',$this->comp_code)->where('status',1)->pluck('invoiceno','invoiceno');
        $sales = $sales->toArray();

        $taxes = Tax::where('company_id',$this->comp_code)->pluck('name','id');
        $taxes = $taxes->toArray();

        $data = '';
        $invoiceno = '';

        if(!empty($request['invoiceno']))
        {
            $invoiceno = $request['invoiceno'];
            $data = Sale::where('company_id',$this->comp_code)->where('invoiceno',$request['invoiceno'])->with('items')->first();
        }

        return view('backend.inventory.sales.editsalesindex')->with('sales',$sales)
            ->with('data',$data)->with('taxes',$taxes)->with('invoiceno',$invoiceno);

    }

    public function update(Request $request)
    {
//        dd($request);

        DB::beginTransaction();

        try {
            $s_date = Sale::where('invoiceno',$request['invoiceno'])->first();
            $sales_item = array();

            if ($request['item']) {
                foreach ($request['item'] as $item) {
                    $item_sku = '';
                    $item_name = '';
                    $item_tax_total= 0;

                    if (!empty($item['item_id'])) {
                        $data = Product::where('id', $item['item_id'])->where('company_id',$this->comp_code)->first();

                        $item_sku = $data['sku'];
                        $item_name = $data['name'];
                    }

                    $tax_id = 0;
                    $tax_amt = 0;

                    if (!empty($item['tax'])) {
                        $tax = Tax::where('id', $item['tax'])->where('company_id',$this->comp_code)->first();


                        if($tax->calculating_mode == 'P')
                        {
                            $item_tax_total = (($item['price'] * $item['quantity']) / 100) * $tax->rate;
                            $tax_amt = ($item['price'] / 100) * $tax->rate;
                        }

                        if($tax->calculating_mode == 'F')
                        {
                            $item_tax_total = $item['quantity']*$tax->rate;
                            $tax_amt = $tax->rate;
                        }
                        $tax_id = $item['tax'];

                    }

//                    $sales_item['product_id'] = $item['item_id'];
//                    $sales_item['name'] = $item_name;
//                    $sales_item['sku'] = $item_sku;
//                    $sales_item['quantity'] = $item['quantity'];
//                    $sales_item['purchased'] = $item['quantity'];
//                    $sales_item['unit_price'] = $item['price'];
//                    $sales_item['tax_id'] = $tax_id;
//                    $sales_item['tax_total'] = $item_tax_total;
                    $sales_item['total_price'] = ($item['price'] + $tax_amt)* $item['quantity'];

                    $request['amount'] += $sales_item['total_price'];

//                    TransProduct::find($item['tr_id'])->update($sales_item);

                    TransProduct::updateOrCreate(['id'=>$item['tr_id']],
                        ['product_id'=>$item['item_id'],
                        'company_id'=>$this->comp_code,
                        'refno'=>$request['invoiceno'],
                        'tr_date'=>$s_date->invoicedate,
                        'contra'=>$request['invoiceno'],
                        'reftype'=>'S',
                        'name'=>$item_name,
                        'sku'=>$item_sku,
                        'quantity'=>$item['quantity'],
                        'sold'=>$item['quantity'],
                        'unit_price'=>$item['price'],
                        'tax_id'=>$tax_id,
                        'tax_total'=>$item_tax_total,
                        'total_price'=>($item['price'] + $tax_amt)* $item['quantity']]);

                    Product::where('company_id',$this->comp_code)->where('id',$item['item_id'])
                        ->increment('committed',$item['quantity'] - $item['old_quantity']);

                    $request->session()->flash('alert-success', 'Sales Data Edit Successfully Completed.');
                }

                $due_amt = $request['amount'] - $s_date->paid_amt - $s_date->discount;

                Sale::where('invoiceno',$request['invoiceno'])
                    ->update(['invoice_amt'=>$request['amount'],'due_amt'=>$due_amt]);
            }

        }catch (\Exception $e)
        {
            DB::rollBack();

            $request->session()->flash('alert-danger', $e->getMessage());
            return redirect()->back();

        }catch (QueryException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-danger', $e->getMessage());
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Sales\EditSalesController@index');

    }
}
