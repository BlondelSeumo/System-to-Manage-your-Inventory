<?php

namespace App\Http\Controllers\Backend\Inventory\Sales;

use App\Models\Common\Tax;
use App\Models\Inventory\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeliverySalesController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * DeliverySalesController constructor.
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
        $sales = Sale::where('company_id', $this->comp_code)->where('status', 2)->pluck('invoiceno', 'invoiceno');
        $sales = $sales->toArray();

        $data = '';
        $invoiceno = '';

        if (!empty($request['invoiceno'])) {
            $invoiceno = $request['invoiceno'];
            $data = Sale::where('company_id', $this->comp_code)->where('invoiceno', $request['invoiceno'])->with('items')->first();
        }

        return view('backend.inventory.sales.deliverysalesindex')->with('sales', $sales)
            ->with('data', $data)->with('invoiceno', $invoiceno);

    }

    public function create(Request $request)
    {
        dd($request);
    }
}
