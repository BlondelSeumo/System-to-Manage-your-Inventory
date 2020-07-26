<?php

namespace App\Http\Controllers\Backend\Inventory\Requisitions;

use App\Models\Inventory\Requisition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class ApproveRequisitionController extends Controller
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
        return view('backend.inventory.requisitions.approverequisitionindex');
    }

    public function getreqdata()
    {

        $requisition = Requisition::where('company_id',$this->comp_code)->where('status',1)->with('items')->select('requisitions.*');


        return DataTables::eloquent($requisition)
            ->addColumn('product', function ($requisition) {
                return $requisition->items->map(function($items) {
                    return $items->item->name;
                })->implode('<br>');
            })


            ->addColumn('quantity', function ($requisition) {
                return $requisition->items->map(function($items) {
                    return $items->quantity;
                })->implode('<br>');
            })

            ->editColumn('reqtype',function ($requisition) { return $requisition->reqType == 'P' ? 'Purchase' : 'Consumption';})
            ->addColumn('action', function ($requisition) {

                return '
                    <button  data-remote="requisition.approve/' . $requisition->refno . '" id="approvereq" class="btn btn-approve btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Approve</button>
                    <button data-remote="requisition.reject/' . $requisition->refno . '" type="button" class="btn btn-xs btn-reject btn-danger pull-right"  ><i class="glyphicon glyphicon-remove"></i>Reject</button>
                    ';
            })
            ->rawColumns(['product','quantity','reqtype','action'])
            ->make(true);
    }

    public function approve($refno)
    {
        $response = Requisition::where('company_id',$this->comp_code)->where('refno',$refno)->update(['status' => 2,'approver'=>$this->user_id]);

        return Response::json($response);
    }

    public function reject($refno)
    {
        $response = Requisition::where('company_id',$this->comp_code)->where('refno',$refno)->update(['status' => 3,'approver'=>$this->user_id]);

        return Response::json($response);
    }

}
