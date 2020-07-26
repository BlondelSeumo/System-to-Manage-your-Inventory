<?php

namespace App\Http\Controllers\Backend\Inventory\Requisitions;

use App\Models\Inventory\Requisition;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PrintRequisitionController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * PrintRequisitionController constructor.
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
        return view('backend.inventory.requisitions.reportrequisitionindex');
    }

    public function dtableindex()
    {
        $requisition = Requisition::where('company_id',$this->comp_code)->where('status',2)->with('items')->select('requisitions.*');


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
                    <button  data-remote="requisition.print/' . $requisition->refno . '" id="approvereq" class="btn btn-print btn-xs btn-primary"><i class="glyphicon glyphicon-print"></i>print</button>
                    ';
            })
            ->rawColumns(['product','quantity','reqtype','action'])
            ->make(true);
    }

    public function print($refno)
    {
        $data = Requisition::where('company_id',$this->comp_code)->where('refno',$refno)->with('items')->first();

        $view = \View::make('backend.inventory.requisitions.pdfrequisition',compact('data','refno'));
        $html = $view->render();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf::AddPage();

        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output('requisitions.pdf');

    }
}
