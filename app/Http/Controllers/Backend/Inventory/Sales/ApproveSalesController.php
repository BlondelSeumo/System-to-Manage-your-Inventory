<?php

namespace App\Http\Controllers\Backend\Inventory\Sales;

use App\Models\Common\Product;
use App\Models\Inventory\Delivery;
use App\Models\Inventory\ProductMovement;
use App\Models\Inventory\Sale;
use App\Models\Inventory\TransProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class ApproveSalesController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * RequisitionController constructor.
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
        return view('backend.inventory.sales.approvesalesindex');
    }

    public function getinvoicedata()
    {

        $invoice = Sale::where('company_id', $this->comp_code)->where('status', 1)->with('items')->select('sales.*');


        return DataTables::eloquent($invoice)
            ->addColumn('product', function ($invoice) {
                return $invoice->items->map(function ($items) {
                    return $items->item->name;
                })->implode('<br>');
            })
            ->addColumn('quantity', function ($invoice) {
                return $invoice->items->map(function ($items) {
                    return $items->quantity;
                })->implode('<br>');
            })
            ->editColumn('pdate', function ($invoice) {
                return Carbon::parse($invoice->invoicedate)->format('d-M-Y');
            })
            ->addColumn('action', function ($invoice) {

                return '
                    <button  data-remote="invoice.approve/' . $invoice->invoiceno . '" id="approvereq" class="btn btn-approve btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Approve</button>
                    <button data-remote="invoice.reject/' . $invoice->invoiceno . '" type="button" class="btn btn-xs btn-reject btn-danger pull-right"  ><i class="glyphicon glyphicon-remove"></i>Reject</button>
                    ';
            })
            ->rawColumns(['product', 'quantity','action'])
            ->make(true);
    }

    public function approve($invoiceno)
    {

        DB::beginTransaction();

        try {
            $invoice = Sale::where('company_id', $this->comp_code)->where('invoiceno', $invoiceno)->with('items')->first();

            $data['company_id'] = $this->comp_code;
            $data['challan_no'] = get_trans_numbers('DC');
            $data['cdate'] = Carbon::now();
            $data['contra'] = $invoice->invoiceno;
            $data['relationship_id'] = $invoice->relationship_id;
            $data['invoice_amt'] = $invoice->invoice_amt;
            $data['delivery_amt'] = $invoice->invoice_amt;
            $data['approver'] = $this->user_id;
            $data['user_id'] = $this->user_id;
            $data['status'] = true;

            Delivery::create($data);

            $delivery_item = array();

            foreach ($invoice->items as $item)
            {
                $delivery_item['company_id'] = $this->comp_code;
                $delivery_item['refno'] = $data['challan_no'];
                $delivery_item['tr_date'] = Carbon::now();
                $delivery_item['contra'] = $invoice->invoiceno;
                $delivery_item['reftype'] = 'SDL'; //('PRC = Purchase Receive, SDL = Sales Delivery PRT = Purchase Return SRT= Sales Return');
                $delivery_item['product_id'] = $item['product_id'];
                $delivery_item['quantity'] = $item['quantity'];
                $delivery_item['delevered'] = $item['quantity'];
                $delivery_item['unit_price'] = $item['unit_price'];
                $delivery_item['tax_id'] = $item['tax_id'];
                $delivery_item['tax_total'] = $item['tax_total'];
                $delivery_item['total_price'] = $item['total_price'];

                ProductMovement::create($delivery_item);

                Product::where('company_id',$this->comp_code)->where('id',$item['product_id'])
                    ->decrement('onhand',$item['quantity']);

                Product::where('company_id',$this->comp_code)->where('id',$item['product_id'])
                    ->decrement('committed',$item['quantity']);

                Product::where('company_id',$this->comp_code)->where('id',$item['product_id'])
                    ->increment('sell_qty',$item['quantity']);

                TransProduct::where('company_id',$this->comp_code)->where('refno',$invoice->invoiceno)
                    ->where('product_id',$item['product_id'])->update(['delevered'=>$item['quantity']]);
            }

            Sale::where('company_id', $this->comp_code)->where('invoiceno', $invoiceno)->update(['status' => 2, 'approver' => $this->user_id]);
            $response = 'Approved';

        }catch (\Exception $e)
        {
            DB::rollBack();
            $response = $e->getMessage();
            return Response::json($response);

        }catch (QueryException $e)
        {
            DB::rollBack();
            $response = $e->getMessage();
            return Response::json($response);
        }

        DB::commit();

//        dd($response);

        return Response::json($response);
    }

    public function reject($invoiceno)
    {
        $response = Sale::where('company_id', $this->comp_code)->where('invoiceno', $invoiceno)->update(['status' => 3, 'approver' => $this->user_id]);

        return Response::json($response);
    }
}
