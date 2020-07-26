<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\ProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Form;

class ProductModelController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * ProductModelController constructor.
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

        return view('backend.inventory.products.productmodelindex');
    }


    public function getModelData()
    {
        $models = ProductModel::query()->where('company_id',$this->comp_code);


        return DataTables::of($models)

            ->addColumn('status', function ($models) {

                return Form::checkbox('status',$models->id,$models->status, array('id'=>'status','disabled'));
            })

            ->addColumn('action', function ($models) {

                return '<button id="editproductsize" data-toggle="modal" data-target="#editModelModal'.$models->id.'"  type="button" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button data-remote="admin.model.delete/' . $models->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" ><i class="fa fa-remove"></i>Del</button>
                    
                    <!-- editModelModal -->
                    
                    <div class="modal fade" id="editModelModal'.$models->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">X</button>
                                    <h4 class="modal-title">Edit Models Data</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" action="admin.model.edit/'.$models->id.'" method="POST" >
                                    
                                    <input type="hidden" name="_token" value="'. csrf_token().'">
                                    <input type="hidden" name="id" value="'.$models->id.'">
                                        
                                        <div class="form-group">
                                            <label for="locale" class="col-md-3 control-label">Language</label>
                                            <div class="col-md-8"> '.

                                            Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা'), $models->locale , array('id' => 'locale', 'class' => 'form-control'))

                                        . '    </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="size" class="col-md-3 control-label">size</label>
                                            <div class="col-md-9">
                                                <input id="name" type="text" class="form-control" name="name" value="'.$models->name.'" required autofocus>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="description" class="col-md-3 control-label">Description</label>
                                            <div class="col-md-9">
                                                <input id="description" type="text" class="form-control" name="description" value="'.$models->description.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="status" class="col-md-3 control-label">Active ?</label>
                                        <div class="col-md-6"> 
                                        '.
                                            Form::checkbox('status',$models->id,$models->status, array('id'=>'status'))
                                        .'
                                        </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" id="update-data">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
            })
            ->make(true);
    }

    public function add(Request $request)
    {

        DB::beginTransaction();
//
        try {

            ProductModel::create([
                'company_id' => $this->comp_code,
                'locale' => $request['locale'],
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'status' =>true,
                'admin_id' => $this->user_id
            ]);

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

        return redirect()->action('Backend\Inventory\Products\ProductModelController@index');
    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        try{

            ProductModel::where('id',$id)->update(['locale'=>$request['locale'],'name'=>$request['name'],'description'=>$request->description,'status'=>$request->status]);
            $request->session()->flash('alert-success', 'Updated');

        }catch (HttpException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-success', $request->name.' Not updated');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Product\ProductModelController@index');
    }


    public function delete($id)
    {

    }
}
