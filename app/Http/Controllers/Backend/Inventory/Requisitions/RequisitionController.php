<?php

namespace App\Http\Controllers\Backend\Inventory\Requisitions;

use App\Models\Common\Product;
use App\Models\Inventory\Requisition;
use App\Models\Inventory\TransProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RequisitionController extends Controller
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
        $products = Product::where('company_id',$this->comp_code)
            ->orderBy('name')
            ->pluck('name','id');

        $reqnumber = get_trans_numbers('RQ');

        return view('backend.inventory.requisitions.requisitionsindex')
            ->with('products',$products)->with('reqnumber',$reqnumber);
    }

    public function getproducts()
    {
        $term = Input::get('term');

        $results = array();

        $queries = Product::where('company_id',$this->comp_code)
            ->where('name', 'LIKE', '%'.$term.'%')->get();

        if(count($queries))
        {
            foreach ($queries as $query)
            {
                $results[] = [ 'item_id' => $query->id, 'value' => $query->name.' Avail '.$query->openingQty ];
            }
        }else
        {
            $results[] = ['value'=>'No Result Found','id'=>''];
        }

        return response()->json($results);
    }



    public function create(Request $request)
    {

        DB::beginTransaction();

        try{

            $request['company_id'] = $this->comp_code;;
            $request['refno'] = ltrim($request['ref_no'],'RQ');
            $request['reqtype'] = $request['req_type'];
            $request['reqdate'] = Carbon::now();
            $request['admin_id'] = $this->user_id;

            Requisition::create($request->all());

            if ($request['item']) {
                foreach ($request['item'] as $item) {

                    $item_sku = '';

                    if (!empty($item['item_id'])) {
                        $data = Product::where('id', $item['item_id'])->first();

                        $item_sku = $data['sku'];
                    }

                    $purchase_item['company_id'] = $this->comp_code;
                    $purchase_item['refno'] = trim($request['ref_no'],'RQ');
                    $purchase_item['contra'] = trim($request['ref_no'],'RQ');
                    $purchase_item['reftype'] = 'R'; //Requisition
                    $purchase_item['towhome'] = null;
                    $purchase_item['product_id'] = $item['item_id'];
                    $purchase_item['sku'] = $item_sku;
                    $purchase_item['quantity'] = $item['quantity'];
                    $purchase_item['remarks'] = $item['remarks'];

                    TransProduct::create($purchase_item);

                    $request->session()->flash('alert-success', 'Requisition Data Successfully Completed For Approval');

                }
            }

        }catch (\Exception $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-danger', $e->getMessage());
            return Redirect::back()->withInput();

        }catch (QueryException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-danger', $e);
            return Redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Requisitions\RequisitionController@index');
    }
}
