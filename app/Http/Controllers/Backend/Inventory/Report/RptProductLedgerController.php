<?php

namespace App\Http\Controllers\Backend\Inventory\Report;

use App\Models\Common\Category;
use App\Models\Common\Product;
use App\Models\Inventory\ProductMovement;
use App\Util\Trans\GenUtil;
use Carbon\Carbon;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RptProductLedgerController extends Controller
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

//        $categories = Category::where('company_id',$this->comp_code)->pluck('name','id');

        $products = Product::where('company_id',$this->comp_code)
            ->orderBy('name')
            ->pluck('name','id');

        $products = $products->toArray();
        $data = '';
        $openingqty = '';
        $periodsum = '';
        $balance = '';
        $item = '';
        $fromdate = '';
        $todate = '';

        if($request['product_id'])
        {
            $fromdate = Carbon::createFromFormat('d/m/Y',$request['fromdate']);
            $todate = Carbon::createFromFormat('d/m/Y',$request['todate']);

            $openingqty = GenUtil::get_item_opening_balance($fromdate,$request['product_id']);

//            dd($openingqty);
            $item = Product::where('company_id',$this->comp_code)->where('id',$request['product_id'])->first();

            $data = ProductMovement::
                selectRaw('tr_date, reftype, refno, quantity,received, delevered')
                ->where('company_id',$this->comp_code)
                ->where('product_id',$request['product_id'])
                ->whereBetween('tr_date',[$fromdate,$todate])
                ->get();

            $periodsum = ProductMovement::
                selectRaw('sum(received) as received , sum(delevered) as delevered')
                ->where('company_id',$this->comp_code)
                ->where('product_id',$request['product_id'])
                ->whereBetween('tr_date',[$fromdate,$todate])
                ->first();

            $balance = $openingqty + $periodsum->received - $periodsum->delevered;

            switch($request['action'])
            {
                case 'preview':

                    return view('backend.inventory.report.html.rptitemledgerindex')
                        ->with('products',$products)->with('data',$data)
                        ->with('openingqty',$openingqty)->with('periodsum',$periodsum)
                        ->with('balance',$balance)->with('item',$item)->with('fromdate',$fromdate)
                        ->with('todate',$todate);

                    break;

                case 'print':

                    $view = \View::make('backend.inventory.report.pdf.pdfitemledger',compact('data','products','openingqty','periodsum','balance','item','fromdate','todate'));
                    $html = $view->render();

                    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

                    $pdf::setFooterCallback(function($pdf){

                        // Position at 15 mm from bottom
                        $pdf->SetY(-15);
                        // Set font
                        $pdf->SetFont('helvetica', 'I', 8);
                        // Page number
                        $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

                    });

                    $pdf::SetMargins(10, 5, 5,0);

                    $pdf::AddPage();

                    $pdf::writeHTML($html, true, false, true, false, '');

                    $pdf::Output('productledger.pdf');

                    break;

            }


        }

        return view('backend.inventory.report.html.rptitemledgerindex')
            ->with('products',$products)->with('data',$data)
            ->with('openingqty',$openingqty)->with('periodsum',$periodsum)
            ->with('balance',$balance)->with('item',$item)->with('fromdate',$fromdate)
            ->with('todate',$todate);
    }


}
