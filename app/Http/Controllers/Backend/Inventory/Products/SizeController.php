<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\NameTranslation;
use App\Models\Common\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Form;

class SizeController extends Controller
{

    public $comp_code;
    public $user_id;

    /**
     * SizeController constructor.
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
        return view('backend.inventory.products.sizeindex');
    }

    public function getSizeData()
    {
        $sizes = Size::query()->where('company_id',$this->comp_code);


        return DataTables::of($sizes)

            ->addColumn('status', function ($sizes) {

                return Form::checkbox('status',$sizes->id,$sizes->status, array('id'=>'status','disabled'));
            })

            ->addColumn('action', function ($sizes) {

                return '<button id="editproductsize" data-toggle="modal" data-target="#editSizeModal'.$sizes->id.'"  type="button" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button data-remote="product.size.delete/' . $sizes->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" ><i class="fa fa-remove"></i>Del</button>
                    
                    <!-- editGodownModal -->
                    
                    <div class="modal fade" id="editSizeModal'.$sizes->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                    <h4 class="modal-title">Edit Unit Data</h4>
                                </div>
                                <form class="form-horizontal" role="form" action="admin.size.edit/'.$sizes->id.'" method="POST" >
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="'. csrf_token().'">
                                    <input type="hidden" name="id" value="'.$sizes->id.'">
                                        
                                        <div class="form-group">
                                            <label for="locale" class="col-md-3 control-label">Language</label>
                                            <div class="col-md-8"> '.

                                            Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা'), $sizes->locale , array('id' => 'locale', 'class' => 'form-control'))

                                        . '    </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="size" class="col-md-3 control-label">size</label>
                                            <div class="col-md-9">
                                                <input id="size" type="text" class="form-control" name="size" value="'.$sizes->size.'" required autofocus>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Description</label>
                                            <div class="col-md-9">
                                                <input id="description" type="text" class="form-control" name="description" value="'.$sizes->description.'" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="status" class="col-md-3 control-label">Active ?</label>
                                        <div class="col-md-6"> '.
                                            Form::checkbox('status',$sizes->id,$sizes->status, array('id'=>'status'))
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

            $ids = Size::create([
                'company_id' => $this->comp_code,
                'locale' => get_locale(),
                'size' => $request->input('size'),
                'description' => $request->input('description'),
                'status' =>true,
                'admin_id' => $this->user_id
            ]);

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = 14;
            $data['table_name'] = 'sizes';
            $data['locale'] = get_locale();
            $data['data_id'] = $ids->id;
            $data['name'] = $request['size'];
            $data['description'] = $request['description'];

            NameTranslation::create($data);


            $request->session()->flash('alert-success', $request->input('size').' Added');
            $request->flash();

        }catch (\Exception $e)
        {
            DB::rollBack();
            $error = $e->getMessage();
            $request->session()->flash('alert-danger', $error.' '.$request->input('size').' Not Saved');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Products\SizeController@index');
    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        try{

            Size::where('id',$id)->update(['locale'=>$request['locale'],'size'=>$request['size'],'description'=>$request->description,'status'=>$request->status]);
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
