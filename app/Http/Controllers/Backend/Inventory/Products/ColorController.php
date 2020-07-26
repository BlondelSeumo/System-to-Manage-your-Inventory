<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Form;

class ColorController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * ColorController constructor.
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
        return view('backend.inventory.products.colorindex');
    }

    public function getColorData()
    {
        $colors = Color::query()->where('company_id',$this->comp_code);


        return DataTables::of($colors)

            ->addColumn('status', function ($colors) {

                return Form::checkbox('status',$colors->id,$colors->status, array('id'=>'status','disabled'));
            })

            ->addColumn('action', function ($colors) {

                return '<button id="editproductsize" data-toggle="modal" data-target="#editSizeModal'.$colors->id.'"  type="button" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button data-remote="product.size.delete/' . $colors->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" ><i class="fa fa-remove"></i>Del</button>
                    
                    <!-- editGodownModal -->
                    
                    <div class="modal fade" id="editSizeModal'.$colors->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                    <h4 class="modal-title">Edit Unit Data</h4>
                                </div>
                                <form class="form-horizontal" role="form" action="admin.size.edit/'.$colors->id.'" method="POST" >
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="'. csrf_token().'">
                                    <input type="hidden" name="id" value="'.$colors->id.'">
                                        
                                        <div class="form-group">
                                            <label for="locale" class="col-md-3 control-label">Language</label>
                                            <div class="col-md-8"> '.

                Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা'), $colors->locale , array('id' => 'locale', 'class' => 'form-control'))

                . '    </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="size" class="col-md-3 control-label">Color</label>
                                            <div class="col-md-9">
                                                <input id="name" type="text" class="form-control" name="name" value="'.$colors->name.'" required autofocus>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Description</label>
                                            <div class="col-md-9">
                                                <input id="description" type="text" class="form-control" name="description" value="'.$colors->description.'" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="status" class="col-md-3 control-label">Active ?</label>
                                        <div class="col-md-6"> '.
                Form::checkbox('status',$colors->id,$colors->status, array('id'=>'status'))
                .'
                                        </div>
                                        </div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
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

            Color::create([
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

        return redirect()->action('Backend\Inventory\Products\ColorController@index');
    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        try{

            Color::where('id',$id)->update(['locale'=>$request['locale'],'name'=>$request['name'],'description'=>$request->description,'status'=>$request->status]);
            $request->session()->flash('alert-success', 'Updated');

        }catch (HttpException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-success', $request->name.' Not updated');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Products\SizeController@index');
    }


    public function delete($id)
    {

    }
}
