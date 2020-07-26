<?php

namespace App\Http\Controllers\Backend\Inventory\Purchase;

use App\Http\Requests\ReturnRequest;
use App\Models\Common\Product;
use App\Models\Common\Tax;
use App\Models\Inventory\ProductMovement;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\Receive;
use App\Models\Inventory\Returned;
use App\Models\Inventory\TransProduct;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReceivePurchasedItemController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * ReceivePurchasedItemController constructor.
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
        $purchase = Purchase::where('company_id',$this->comp_code)->where('status',2)->pluck('refno','refno');
        $purchase = $purchase->toArray();

//        $taxes = Tax::where('company_id',$this->comp_code)->pluck('name','id');
//        $taxes = $taxes->toArray();


        $data = '';
        $refno = '';

        if(!empty($request['refno']))
        {
            $refno = $request['refno'];
            $data = Purchase::where('company_id',$this->comp_code)->where('refno',$request['refno'])->with('items')->first();
        }

        return view('backend.inventory.purchase.receiveindex')->with('purchase',$purchase)
            ->with('data',$data)->with('refno',$refno);
    }

    public function receive(ReturnRequest $request)
    {

//        dd($request['returned']);

        $podata = Purchase::where('company_id',$this->comp_code)->where('refno',$request['refno'])->first();

        $request['company_id'] = $this->comp_code;
        $request['type'] = 'L'; //Local Purchase
        $request['refno'] = get_trans_numbers('PR');
        $request['rdate'] = Carbon::now();
        $request['contra'] = $podata->refno;
        $request['relationship_id'] = $podata->relationship_id;
        $request['invoice_amt'] = $podata['invoice_amt'];
        $request['user_id'] = $this->user_id;
        $request['status'] = true;
        $request['deleted'] = false;

        DB::beginTransaction();

        try {

            $ids = Receive::create($request->all());
//            $request['refno'] = get_trans_numbers('PR');

            if($request['returned'] > 0)
            {
                $return_id = Returned::create($request->all());
            }

            $receive_item = array();

            if ($request['item']) {
                foreach ($request['item'] as $item) {
                    $item_sku = '';
                    $item_tax_total= 0;

                    $tax_id = 0;
                    $tax_amt = 0;

                    if (!empty($item['tax_id'])) {
                        $tax = Tax::where('id', $item['tax_id'])->where('company_id',$this->comp_code)->first();


                        if($tax->calculating_mode == 'P')
                        {
                            $item_tax_total = (($item['price'] * $item['receive']) / 100) * $tax->rate;
                            $tax_amt = ($item['price'] / 100) * $tax->rate;
                        }

                        if($tax->calculating_mode == 'F')
                        {
                            $item_tax_total = $item['receive']*$tax->rate;
                            $tax_amt = $tax->rate;
                        }

                        $tax_id = $item['tax_id'];

                    }

                    $receive_item['company_id'] = $this->comp_code;
                    $receive_item['refno'] = $request['refno'];
                    $receive_item['tr_date'] = Carbon::now();
                    $receive_item['contra'] = $podata->refno;
                    $receive_item['reftype'] = 'PRC'; //('PRC = Purchase Receive, SDL = Sales Delivery PRT = Purchase Return SRT= Sales Return');
                    $receive_item['product_id'] = $item['item_id'];
                    $receive_item['sku'] = $item_sku;
                    $receive_item['quantity'] = $item['quantity'];
                    $receive_item['received'] = $item['receive'];
                    $receive_item['returned'] = $item['return'];
                    $receive_item['unit_price'] = $item['price'];
                    $receive_item['tax_id'] = $tax_id;
                    $receive_item['tax_total'] = $item_tax_total;
                    $receive_item['total_price'] = ($item['price'] + $tax_amt)* $item['receive'];

                    $request['amount'] += $receive_item['total_price'];

                    if($receive_item['received'] > 0)
                    {
                        ProductMovement::create($receive_item);

                        Product::where('company_id',$this->comp_code)->where('id',$item['item_id'])
                            ->increment('onhand',$item['receive']);

                        Product::where('company_id',$this->comp_code)->where('id',$item['item_id'])
                            ->increment('received_qty',$item['receive']);

                        Product::where('company_id',$this->comp_code)->where('id',$item['item_id'])
                            ->increment('return_qty',$item['return']);

                        TransProduct::where('company_id',$this->comp_code)->where('refno',$request['refno'])
                            ->where('product_id',$item['item_id'])->update(['received'=>$item['quantity'],
                                    'returned'=>$item['return']]);
                    }

                }

                Purchase::where('company_id',$this->comp_code)->where('refno',$podata->refno)
                    ->update(['status'=> 4]);

                Receive::where('id',$ids->id)
                    ->update(['receive_amt'=>$request['amount']]);

                $request->session()->flash('alert-success', 'Purchase Products Received');
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
