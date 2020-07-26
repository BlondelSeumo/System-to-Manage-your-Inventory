<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 11/27/17
 * Time: 7:26 PM
 */

namespace App\Util\Trans;


use App\Models\Common\Product;
use App\Models\Inventory\ProductMovement;
use Illuminate\Support\Facades\Auth;

class GenUtil
{
    public $comp_code;
    public $user_id;

    /**
     * BrandController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->comp_code = Auth::guard('admin')->user()->company_id;
            $this->user_id = Auth::guard('admin')->user()->id;

            return $next($request);
        });
    }

    public static function date_to_period($date)
    {
        $day = substr($date,0,2);
        $month = substr($date,3,2);
        $year = substr($date,6,4);

        $period = date('Y-MM', strtotime($year.'-'.$month.'-'.$day));

        return($period);
    }

    public static function get_item_opening_balance($reportdate, $item)
    {
        $opening = Product::where('company_id',Auth::guard('admin')->user()->company_id)->where('id',$item)->first();

        $qtyin = ProductMovement::where('company_id',Auth::guard('admin')->user()->company_id)
            ->where('tr_date','<',$reportdate)
            ->where('reftype','PRC')
            ->where('product_id',$item)->sum('quantity');

        $qtyout = ProductMovement::where('company_id',Auth::guard('admin')->user()->company_id)
            ->where('tr_date','<',$reportdate)
            ->where('reftype','SDL')
            ->where('product_id',$item)->sum('quantity');

        $openingqty = $opening->opening_qty + $qtyin - $qtyout;

        return $openingqty;

    }

}