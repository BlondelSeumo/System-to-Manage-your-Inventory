<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Form;

class TaxController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * TaxController constructor.
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
        return view('backend.inventory.products.taxindex');
    }

    public function getTaxData()
    {
        $taxes = Tax::query()->where('company_id',$this->comp_code);


        return DataTables::of($taxes)

            ->addColumn('status', function ($taxes) {

                return Form::checkbox('status',$taxes->id,$taxes->status, array('id'=>'status','disabled'));
            })

            ->addColumn('action', function ($taxes) {

                return '<button id="editproductsize" data-toggle="modal" data-target="#editModelModal'.$taxes->id.'"  type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="product.tax.delete/' . $taxes->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" ><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    
                    <!-- editModelModal -->
                    
                    <div class="modal fade" id="editModelModal'.$taxes->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">X</button>
                                    <h4 class="modal-title">Edit Models Data</h4>
                                </div>
                                <form class="form-horizontal" role="form" action="product.tax.edit/'.$taxes->id.'" method="POST" >
                                <div class="modal-body">
                                    
                                    
                                    <input type="hidden" name="_token" value="'. csrf_token().'">
                                    <input type="hidden" name="id" value="'.$taxes->id.'"> 

                                    <div class="form-group">
                                            <label for="locale" class="col-md-3 control-label">Language</label>
                                            <div class="col-md-8"> '.

                                                Form::select('locale', array('0' => 'Please Select', 'en-US' => 'English', 'bn-BD' => 'বাংলা'), $taxes->locale , array('id' => 'locale', 'class' => 'form-control'))

                                    . '    </div>
                                        </div>
                
                                    
                                        <div class="form-group">
                                            <label for="size" class="col-md-3 control-label">Tax Name</label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control" name="name" value="'.$taxes->name.'" required autofocus>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="applicableOn" class="col-md-3 control-label">Applicable On</label>
                                            <div class="col-md-8"> '.

                Form::select('applicable_on', array('S' => 'Sales', 'P' => 'Purchase', 'B' => 'Both'), $taxes->applicable_on , array('id' => 'applicable_on', 'class' => 'form-control'))

                . '    </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="rate" class="col-md-3 control-label">Rate (%)</label>
                                            <div class="col-md-8">
                                                <input id="rate" type="text" class="form-control" name="rate" value="'.$taxes->rate.'" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="calculatingMode" class="col-md-3 control-label">Calculating Mode</label>
                                            <div class="col-md-8"> '.

                Form::select('calculating_mode', array('P' => 'Purcentage', 'F' => 'Fixed'), $taxes->calculating_mode , array('id' => 'calculating_mode', 'class' => 'form-control'))

                . '    </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="description" class="col-md-3 control-label">Description</label>
                                            <div class="col-md-8">
                                                <input id="description" type="text" class="form-control" name="description" value="'.$taxes->description.'">
                                            </div>
                                        </div>
                                                                                
                                        <div class="form-group">
                                        <label for="status" class="col-md-3 control-label">Active ?</label>
                                        <div class="col-md-6"> '.
                Form::checkbox('status',$taxes->id,$taxes->status, array('id'=>'status'))
                .'
                                        </div>
                                        </div>
                                        
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                    </div>
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

            Tax::create([
                'company_id' => $this->comp_code,
                'locale' => $request['locale'],
                'name' => $request['name'],
                'applicable_on' => $request->input('applicable_on'),
                'rate' => $request->input('rate'),
                'calculating_mode' => $request->input('calculating_mode'),
                'description' => $request->input('description'),
                'status' =>true,
                'admin_id' =>$this->user_id
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

        return redirect()->action('Backend\Inventory\Products\TaxController@index');
    }

    public function edit(Request $request, $id)
    {

        DB::beginTransaction();

        try{

            if(empty($request->status))
            {
                $request->request->add(['active'=>false]);

            }else{
                $request->request->add(['active'=>true]);
            }

            Tax::where('id',$id)->update(['name' => $request->input('name'),
                'applicable_on'=>$request->input('applicableOn'),
                'rate'=>$request->input('rate'),
                'calculating_mode'=>$request->input('calculatingMode'),
                'description'=>$request->input('description'),
                'status'=>$request->active]);

            $request->session()->flash('alert-success', 'Updated');

        }catch (HttpException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-success', $request->name.' Not updated');
            return redirect()->back();
        }catch (\Illuminate\Database\QueryException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-success', $e.' '.$request->name.' Not updated');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Products\TaxController@index');
    }


    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            Tax::find($id)->delete();
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


}
