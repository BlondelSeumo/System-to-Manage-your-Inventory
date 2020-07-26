<?php

namespace App\Http\Controllers\Backend\Inventory\Purchase;

use App\Models\Common\Product;
use App\Models\Common\Tax;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\TransProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditPurchaseController extends Controller
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
        $purchase = Purchase::where('company_id',$this->comp_code)->where('status',1)->pluck('refno','refno');
        $purchase = $purchase->toArray();

        $taxes = Tax::where('company_id',$this->comp_code)->pluck('name','id');
        $taxes = $taxes->toArray();


        $data = '';
        $refno = '';

        if(!empty($request['refno']))
        {
            $refno = $request['refno'];
            $data = Purchase::where('company_id',$this->comp_code)->where('refno',$request['refno'])->with('items')->first();
        }

        return view('backend.inventory.purchase.editpurchaseindex')->with('purchase',$purchase)
            ->with('data',$data)->with('taxes',$taxes)->with('refno',$refno);
    }

    public function update(Request $request)
    {
//        dd($request);

        DB::beginTransaction();

        try {
            $p_data = Purchase::where('refno',$request['refno'])->first();
            $purchase_item = array();

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


                        if($tax->calculatingMode == 'P')
                        {
                            $item_tax_total = (($item['price'] * $item['quantity']) / 100) * $tax->rate;
                            $tax_amt = ($item['price'] / 100) * $tax->rate;
                        }

                        if($tax->calculatingMode == 'F')
                        {
                            $item_tax_total = $item['quantity']*$tax->rate;
                            $tax_amt = $tax->rate;
                        }
                        $tax_id = $item['tax'];

                    }

//                    $purchase_item['company_id'] = $this->comp_code;
//                    $purchase_item['refno'] = ltrim($request['orderNo'],'PO');
//                    $purchase_item['contra'] = ltrim($request['orderNo'],'PO');
//                    $purchase_item['reftype'] = 'P';
                    $purchase_item['product_id'] = $item['item_id'];
                    $purchase_item['name'] = $item_name;
                    $purchase_item['sku'] = $item_sku;
                    $purchase_item['quantity'] = $item['quantity'];
                    $purchase_item['tr_date'] = $p_data->pdate;
                    $purchase_item['purchased'] = $item['quantity'];
                    $purchase_item['unit_price'] = $item['price'];
                    $purchase_item['tax_id'] = $tax_id;
                    $purchase_item['tax_total'] = $item_tax_total;
                    $purchase_item['total_price'] = ($item['price'] + $tax_amt)* $item['quantity'];

                    $request['amount'] += $purchase_item['total_price'];

                    TransProduct::find($item['tr_id'])->update($purchase_item);

                    $request->session()->flash('alert-success', 'Purchase Data Successfully Completed For Approval');
                }


                $due_amt = $request['amount'] - $p_data->paid_amt - $p_data->discount;

                Purchase::where('refno',$request['refno'])
                    ->update(['invoice_amt'=>$request['amount'],'due_amt'=>$request['amount']]);
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

        return redirect()->action('Backend\Auth\AdminController@index');

    }
}
