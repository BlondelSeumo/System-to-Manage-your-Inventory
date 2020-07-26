<?php

namespace App\Http\Controllers\Backend\Inventory\Sales;

use App\Models\Common\Relationship;
use App\Models\Inventory\Delivery;
use App\Models\Inventory\ProductMovement;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RptDeliveryChallanController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * RptInvoiceController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->comp_code = Auth::guard('admin')->user()->company_id;
            $this->user_id = Auth::guard('admin')->user()->id;

            return $next($request);
        });
    }


    /**
     * @return string
     */

    public function index(Request $request)
    {

        $customers = Relationship::where('company_id',$this->comp_code)
            ->where('type','CS')
            ->orderBy('name')->pluck('name','id');

        $customers = $customers->toArray();

        if(!empty($request['challan_no']))
        {
            $items = ProductMovement::query()->where('refno',$request['challan_no'])
                ->where('company_id',$this->comp_code)
                ->where('reftype','SDL')->with('item')->get();

            $challan = Delivery::query()->where('company_id',$this->comp_code)
                ->where('challan_no',$request['challan_no'])->with('relationship')->first();

            switch($request['action']) {

                case 'preview': //action for html here
                    return view('backend.inventory.report.html.rptdeliverychallanindex')->with('items',$items);
                    break;

                case 'print': //action for css here

                    $view = \View::make('backend.inventory.report.pdf.pdfdeliverychallan',compact('items','challan'));
                    $html = $view->render();

                    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

                    $pdf::AddPage();

                    $pdf::writeHTML($html, true, false, true, false, '');
                    $pdf::Output('challan.pdf');

                    break;

            }
        }

//        return view('backup.requisitionIndex');
//
        return view('backend.inventory.report.html.rptdeliverychallanindex')->with('customers',$customers);
    }

    /**
     * @return string
     */

    public function autocomplete()
    {

        $term = Input::get('term');

        $results = array();

        $queries = Delivery::select('id', 'challan_no')
            ->where('company_id',$this->comp_code)
            ->where('challan_no', 'LIKE', '%'.$term.'%')->get();

        if(count($queries))
        {
            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->id, 'value' => $query->challan_no ];
            }
        }else
        {
            $results[] = ['value'=>'No Result Found','id'=>''];
        }

        return response()->json($results);

    }
}
