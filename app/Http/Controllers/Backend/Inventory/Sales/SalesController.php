<?php

namespace App\Http\Controllers\Backend\Inventory\Sales;

use App\Models\Common\Product;
use App\Models\Common\Relationship;
use App\Models\Common\Tax;
use App\Models\Inventory\Sale;
use App\Models\Inventory\TransProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * SalesController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->comp_code = Auth::guard('admin')->user()->company_id;
            $this->user_id = Auth::guard('admin')->user()->id;

            return $next($request);
        });
    }

    public function index()
    {

        $customers = Relationship::where('company_id',$this->comp_code)
            ->where('type','CS')
            ->orderBy('name')->pluck('name','id');

        $sinumber = get_trans_numbers('SI');

        $taxes = Tax::where('company_id',$this->comp_code)->pluck('name','id');
        $taxes = $taxes->toArray();

        return view('backend.inventory.sales.salesindex')->with('customers',$customers)
            ->with('sinumber',$sinumber)->with('taxes',$taxes);
    }

    public function create(Request $request)
    {

//        dd($request);

        $request['company_id'] = $this->comp_code;
        $request['type'] = 'L'; //Local Sale
        $request['invoiceno'] = ltrim($request['invoiceno'],'SI');
        $request['invoicedate'] = Carbon::createFromFormat('d/m/Y',$request['date']);
        $request['user_id'] = $this->user_id;
        $request['status'] = true;
        $request['deleted'] = false;

        DB::beginTransaction();

        try {

            $ids = Sale::create($request->all());

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

                    $sales_item['company_id'] = $this->comp_code;
                    $sales_item['refno'] = ltrim($request['invoiceno'],'SI');
                    $sales_item['contra'] = ltrim($request['invoiceno'],'SI');
                    $sales_item['reftype'] = 'S';
                    $sales_item['tr_date'] = Carbon::createFromFormat('d/m/Y',$request['date']);
                    $sales_item['product_id'] = $item['item_id'];
                    $sales_item['name'] = $item_name;
                    $sales_item['sku'] = $item_sku;
                    $sales_item['quantity'] = $item['quantity'];
                    $sales_item['sold'] = $item['quantity'];
                    $sales_item['unit_price'] = $item['price'];
                    $sales_item['tax_id'] = $tax_id;
                    $sales_item['tax_total'] = $item_tax_total;
                    $sales_item['total_price'] = ($item['price'] + $tax_amt)* $item['quantity'];

                    $request['amount'] += $sales_item['total_price'];

                    TransProduct::create($sales_item);

                    Product::where('company_id',$this->comp_code)->where('id',$item['item_id'])
                        ->increment('committed',$item['quantity']);

                    $request->session()->flash('alert-success', 'Sales Data Successfully Completed For Approval');
                }

                $due_amt = $request['amount'] - $request['paid_amt'] - $request['discount'];

                Sale::where('id',$ids->id)
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

        return redirect()->action('Backend\Inventory\Sales\SalesController@index');
    }
}
