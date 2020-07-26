<?php

namespace App\Http\Controllers\Backend\Inventory\Report;

use App\Models\Common\Product;
use Carbon\Carbon;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RptProductlistController extends Controller
{
    public function productlist(Request $request)
    {

        $data = '';
        $date = '';

        if($request['reportdate'])
        {
            $date = $request['reportdate'];
            $reportdate = Carbon::createFromFormat('d/m/Y',$request['reportdate']);

            $data = Product::all();
        }

        switch($request['action'])
        {
            case 'preview':

                return view('backend.inventory.report.html.rptproductlistindex')
                    ->with('data',$data)->with('date',$date);
                break;

            case 'print':

                $view = \View::make('backend.inventory.report.pdf.pdfproductlist',compact('data','date'));
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

                $pdf::Output('productlist.pdf');

                break;

        }

        return view('backend.inventory.report.html.rptproductlistindex')
            ->with('data',$data)->with('date',$date);
    }
}
