<?php

namespace App\Http\Controllers\Backend\Inventory\Purchase;

use App\Models\Common\Product;
use App\Models\Common\Relationship;
use App\Models\Common\Tax;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\TransProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
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

    public function index()
    {

        $suppliers = Relationship::where('company_id',$this->comp_code)
            ->where('type','LS')
            ->orderBy('name')->pluck('name','id');

        $ponumber = get_trans_numbers('PR');

        $taxes = Tax::where('company_id',$this->comp_code)->pluck('name','id');
        $taxes = $taxes->toArray();

        return view('backend.inventory.purchase.purchaseindex')->with('suppliers',$suppliers)
            ->with('ponumber',$ponumber)->with('taxes',$taxes);
    }

    public function create(Request $request)
    {

//        dd($request);

        $request['company_id'] = $this->comp_code;
        $request['type'] = 'L'; //Local Purchase
        $request['refno'] = ltrim($request['orderNo'],'PO');
        $request['pdate'] = Carbon::createFromFormat('d/m/Y',$request['pdate']);
        $request['user_id'] = $this->user_id;
        $request['status'] = true;
        $request['deleted'] = false;

        DB::beginTransaction();

        try {

            $ids = Purchase::create($request->all());

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

                    $purchase_item['company_id'] = $this->comp_code;
                    $purchase_item['refno'] = ltrim($request['orderNo'],'PO');
                    $purchase_item['contra'] = ltrim($request['orderNo'],'PO');
                    $purchase_item['reftype'] = 'P';
                    $purchase_item['product_id'] = $item['item_id'];
                    $purchase_item['name'] = $item_name;
                    $purchase_item['sku'] = $item_sku;
                    $purchase_item['quantity'] = $item['quantity'];
                    $purchase_item['purchased'] = $item['quantity'];
                    $purchase_item['unit_price'] = $item['price'];
                    $purchase_item['tax_id'] = $tax_id;
                    $purchase_item['tax_total'] = $item_tax_total;
                    $purchase_item['total_price'] = ($item['price'] + $tax_amt)* $item['quantity'];

                    $request['amount'] += $purchase_item['total_price'];

                    TransProduct::create($purchase_item);

                    Product::where('company_id',$this->comp_code)->where('id',$item['item_id'])
                        ->increment('purchase_qty',$item['quantity']);

                    $request->session()->flash('alert-success', 'Purchase Data Successfully Completed For Approval');
                }

                $due_amt = $request['amount'] - $request['paid_amt'] - $request['discount'];

                Purchase::where('id',$ids->id)
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

        return redirect()->action('Backend\Inventory\Purchase\PurchaseController@index');
    }
}
