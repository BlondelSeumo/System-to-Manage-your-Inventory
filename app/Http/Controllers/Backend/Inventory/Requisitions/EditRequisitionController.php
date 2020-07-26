<?php

namespace App\Http\Controllers\Backend\Inventory\Requisitions;

use App\Models\Common\Product;
use App\Models\Inventory\Requisition;
use App\Models\Inventory\TransProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Yajra\DataTables\DataTables;
use Form;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EditRequisitionController extends Controller
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



//        $requisition = Requisition::query()->where('company_id',$this->comp_code)
//            ->where('status',1)
//            ->with('items')->get();

//        $requisition = TransProduct::query()->where('company_id',$this->comp_code)
//            ->with('requisition')->where('status',1)->get();
//
//        dd($requisition);

//        $requisition = Requisition::with('items')->get();
//
//        echo implode("<br>",$requisition);

//        $query = User::with('posts')->select('users.*');

//        dd($requisition);

//        $userPr = UserPrivilegesModel::where('email',Auth::user()->email)
//            ->where('compCode',Auth::user()->compCode)
//            ->where('useCaseId','P02')->first();
//
//        if($userPr->view == 0)
//        {
//            session()->flash('alert-danger', 'You do not have permission. Please Contact Administrator');
//            return redirect()->back();
//            die();
//        }
        $product = Product::where('company_id',$this->comp_code)->pluck('name','id');

        return view('backend.inventory.requisitions.editrequisitionindex')->with('product',$product);
    }

    public function getreqdata()
    {

        $query = Requisition::where('status',1)->with('items')->select('requisitions.*');


        return Datatables::eloquent($query)
            ->addColumn('product', function (Requisition $requisition) {
                return $requisition->items->map(function($items) {
                    return $items->item->name;
                })->implode('<br>');
            })

            ->addColumn('quantity', function (Requisition $requisition) {
                return $requisition->items->map(function($items) {
                    return $items->quantity;
                })->implode('<br>');
            })

            ->editColumn('reqtype',function ($requisition) { return $requisition->reqType == 'P' ? 'Purchase' : 'Consumption';})
            ->addColumn('action', function ($requisition) {

                return '
                    <button  data-remote="requisition.edit/' . $requisition->refno . '" id="editrequisition" data-toggle="modal" type="button" class="btn btn-edit btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="product.brand.delete/' . $requisition->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right"  ><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    ';
            })
            ->rawColumns(['product','quantity','reqtype','action'])
            ->make(true);
    }

    public function reqitemdata($refno)
    {
        $data = TransProduct::where('refno',$refno)->with('item')->get();
        return json_encode($data);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        try {

            for($i=0; $i< count($request['id']); $i++)
            {
                TransProduct::where('id',$request['id'][$i])->update(['quantity' => $request['quantity'][$i]]);
            }


            $request->session()->flash('alert-success', 'Successfully Updated');

        } catch (\HttpException $e) {
            DB::rollBack();
            $request->session()->flash('alert-danger', $e->getMessage());
            return redirect()->back();
        } catch (QueryException $e) {
            DB::rollBack();
            $request->session()->flash('alert-danger', $e->getMessage());
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Requisitions\EditRequisitionController@index');
    }
}
