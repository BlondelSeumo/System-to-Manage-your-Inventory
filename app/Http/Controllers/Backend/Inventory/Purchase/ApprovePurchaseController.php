<?php

namespace App\Http\Controllers\Backend\Inventory\Purchase;

use App\Models\Inventory\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class ApprovePurchaseController extends Controller
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
        return view('backend.inventory.purchase.approvepurchaseindex');
    }

    public function getpurchasedata()
    {

        $purchase = Purchase::where('company_id', $this->comp_code)->where('status', 1)->with('items')->select('purchases.*');


        return DataTables::eloquent($purchase)
            ->addColumn('product', function ($purchase) {
                return $purchase->items->map(function ($items) {
                    return $items->item->name;
                })->implode('<br>');
            })
            ->addColumn('quantity', function ($purchase) {
                return $purchase->items->map(function ($items) {
                    return $items->quantity;
                })->implode('<br>');
            })
            ->editColumn('pdate', function ($purchase) {
                return Carbon::parse($purchase->pdate)->format('d-M-Y');
            })
            ->addColumn('action', function ($purchase) {

                return '
                    <button  data-remote="purchase.approve/' . $purchase->refno . '" id="approvereq" class="btn btn-approve btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Approve</button>
                    <button data-remote="purchase.reject/' . $purchase->refno . '" type="button" class="btn btn-xs btn-reject btn-danger pull-right"  ><i class="glyphicon glyphicon-remove"></i>Reject</button>
                    ';
            })
            ->rawColumns(['product', 'quantity','action'])
            ->make(true);
    }

    public function approve($refno)
    {
        $response = Purchase::where('company_id', $this->comp_code)->where('refno', $refno)->update(['status' => 2, 'approver' => $this->user_id]);

        return Response::json($response);
    }

    public function reject($refno)
    {
        $response = Purchase::where('company_id', $this->comp_code)->where('refno', $refno)->update(['status' => 3, 'approver' => $this->user_id]);

        return Response::json($response);
    }
}