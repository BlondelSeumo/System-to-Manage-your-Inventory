<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\AppLanguage;
use App\Models\Common\Brand;
use App\Models\Common\NameTranslation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
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


    public function index()
    {
        $locales = AppLanguage::where('locale','<>',get_locale())->pluck('name','locale');

        return view('backend.inventory.products.brandindex')->with('locales',$locales);
    }

    public function getBrandData()
    {
        $brands = Brand::query()->where('company_id',$this->comp_code);;


        return DataTables::of($brands)
//            ->addColumn('showimage',function ($brands) {
//                return '<img src=" '.$brands->imagePath.' " height='. 25 .' width= ' . 75 .'  />';
//            })
            ->editColumn('showimage', function ($brands) {
                if (!isset($brands->imagePath)) {
                    return "";
                }
                return '<img src="' . $brands->imagePath .
                '" alt=" " style="height: 25px; width: 40px;" >';
            })

//            ->addColumn('action', function ($brands) {
//
//                return '<button id="editproject" data-toggle="modal" data-target="#editCategoryModal'.$brands->id.'"  type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
//                    <button data-remote="admin.brand.delete/' . $brands->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" ><i class="glyphicon glyphicon-remove"></i>Delete</button>
//
//                    <!-- editCategoryModal -->
//
//                    <div class="modal fade" id="editCategoryModal'.$brands->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
//                        <div class="modal-dialog">
//                            <div class="modal-content">
//                                <div class="modal-header">
//                                    <button type="button" class="close" data-dismiss="modal">x</button>
//                                    <h4 class="modal-title">Edit Brands</h4>
//                                </div>
//                            <form class="form-horizontal" role="form" action="admin.brand.edit/'.$brands->id.'" method="POST" >
//                                <div class="modal-body">
//
//
//                                    <input type="hidden" name="_token" value="'. csrf_token().'">
//                                    <input type="hidden" name="id" value="'.$brands->id.'">
//                                        <div class="form-group">
//                                            <label for="name" class="col-md-3 control-label">Name</label>
//                                            <div class="col-md-8">
//                                                <input id="name" type="text" class="form-control" name="name" value="'.$brands->name.'" required autofocus>
//                                            </div>
//                                        </div>
//
//                                        <div class="form-group">
//                                            <label class="control-label col-md-3">Manufacturer</label>
//                                            <div class="col-md-8">
//                                                <input name="manufacturer" class="form-control" type="text" id="manufacturer" value="'.$brands->manufacturer.'">
//
//                                            </div>
//                                        </div>
//
//
//                                    <div class="form-group">
//                                        <div class="col-md-10 col-md-offset-1">
//                                            <button type="submit" class="btn btn-primary  pull-right">Submit</button>
//                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
//                                        </div>
//                                    </div>
//                                </form>
//                            </div>
//                        </div>
//                    </div>';
//            })
            ->addColumn('action', function ($brands) {

                return '<button data-remote="backend.brand.modaldata/'.$brands->id.'"  type="button" class="btn btn-edit btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="admin.brand.delete/' . $brands->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" disabled><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    ';
            })
            ->rawColumns(['status','action','title','showimage'])
            ->make(true);
    }

    public function add(Request $request)
    {
        $file = Input::file('logo');

        if(!empty($file)) {

            $filename = Input::file('logo')->getClientOriginalName();
            Input::file('logo')->move('images/brands/', $filename);
            $request->request->add(['imagePath' => 'images/brands/'.$filename,'company_id'=>$this->comp_code]);
        }

        $request['company_id'] = $this->comp_code;
        $request['admin_id'] = $this->user_id;

        DB::beginTransaction();
        $data = array();

        try {

            $ids = Brand::create($request->except(['logo']));

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = 13;
            $data['table_name'] = 'brands';
            $data['locale'] = get_locale();
            $data['data_id'] = $ids->id;
            $data['name'] = Str::upper($request['name']);
            $data['description'] = $request['name'];

            NameTranslation::create($data);

            $request->session()->flash('alert-success', $request->input('name').' Added');
            $request->flash();

        }catch (\Exception $e)
        {
            DB::rollBack();
            $error = $e->getMessage();
            $request->session()->flash('alert-danger', $error.' '.$request->input('name').' Not Saved');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Products\BrandController@index');
    }

    public function edit(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            Brand::where('id',$id)->update(['name'=>$request->input('name'),'manufacturer' => $request->input('manufacturer')]);
            $request->session()->flash('alert-success', 'Successfully Updated');

        }catch (HttpException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-danger', $request->name.' Not updated');
            return redirect()->back();
        }catch (\Illuminate\Database\QueryException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-danger', $e.' '.$request->name.' Not updated');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Products\BrandController@index');
    }


    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            Brand::find($id)->delete();
            echo json_encode(array("status" => TRUE));

        }catch (HttpException $e)
        {
            DB::rollBack();
            return $e;
        }catch (\Illuminate\Database\QueryException $e)
        {
            DB::rollBack();
            return $e;
        }

        DB::commit();

    }

    public function newlocate(Request $request)
    {
        DB::beginTransaction();

        try {

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = '13';
            $data['table_name'] = 'brands';
            $data['locale'] = $request['locale'];
            $data['data_id'] = $request['id'];
            $data['name'] = $request['name'];
            $data['description'] = $request['description'];

            NameTranslation::create($data);
        }catch (HttpException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-danger', $e.' '.$request['name'].' Not updated');
            return redirect()->back();
        }catch (QueryException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-danger', $e.' '.$request['name'].' Not updated');
            return redirect()->back();
        }

        DB::commit();

        $request->session()->flash('alert-success', 'Updated');
        return redirect()->action('Backend\Inventory\Products\CategoryController@index');
    }
}
