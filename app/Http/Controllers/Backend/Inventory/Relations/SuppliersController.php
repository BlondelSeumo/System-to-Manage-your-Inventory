<?php

namespace App\Http\Controllers\Backend\Inventory\Relations;

use App\Models\Common\Country;
use App\Models\Common\Relationship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Form;

class SuppliersController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * SuppliersController constructor.
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
//        dd($request->segments());

        $countries = Country::pluck('country_name','countrycode_n');
        return view('backend.inventory.relations.suppliersindex')->with('countries',$countries);
    }

    public function getsuppliers()
    {
        $relations = Relationship::query()->where('company_id',$this->comp_code);


        return DataTables::of($relations)

            ->addColumn('status', function ($relations) {
                return Form::checkbox('status',$relations->id,$relations->status, array('id'=>'status','disabled'));
            })

            ->addColumn('action', function ($relations) {
                $countries = Country::pluck('country_name','countrycode_n');

                return '<button id="editproductsize" data-toggle="modal" data-target="#editModelModal'.$relations->id.'"  type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="relationship.data.delete/' . $relations->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" ><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    
                    <!-- editModelModal -->
                    
                    <div class="modal fade" id="editModelModal'.$relations->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">X</button>
                                    <h4 class="modal-title">Edit Models Data</h4>
                                </div>
                                <form class="form-horizontal" role="form" action="relationship.data.edit/'.$relations->id.'" method="POST" >
                                <div class="modal-body">
                                    <input type="hidden" name="_token" value="'. csrf_token().'">
                                    <input type="hidden" name="id" value="'.$relations->id.'"> 
                                    
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Company Name</label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control" name="name" value="'.$relations->name.'" required autofocus>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="tax_number" class="col-md-3 control-label">Company Tax No</label>
                                            <div class="col-md-8">
                                                <input id="tax_number" type="text" class="form-control" name="tax_number" value="'.$relations->tax_number.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="glcode" class="col-md-3 control-label">Company GL Code</label>
                                            <div class="col-md-8">
                                                <input id="glcode" type="text" class="form-control" name="glcode" value="'.$relations->glcode.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="phone_number" class="col-md-3 control-label">Company Phone No</label>
                                            <div class="col-md-8">
                                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="'.$relations->phone_number.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="website" class="col-md-3 control-label">Company Website</label>
                                            <div class="col-md-8">
                                                <input id="website" type="text" class="form-control" name="website" value="'.$relations->website.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="email" class="col-md-3 control-label">Company E-mail</label>
                                            <div class="col-md-8">
                                                <input id="email" type="text" class="form-control" name="email" value="'.$relations->email.'">
                                            </div>
                                        </div>
                                        
                                        <legend style="font-size: large;"><b> Company Address : </b><span style="font-size: medium">Add an address to this company, for use in your Sales Orders, Invoices and Purchase order</span> </legend>
                                        
                                        <div class="form-group">
                                            <label for="street" class="col-md-3 control-label">Street</label>
                                            <div class="col-md-8">
                                                <input id="street" type="text" class="form-control" name="street" value="'.$relations->street.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="address" class="col-md-3 control-label">Address</label>
                                            <div class="col-md-8">
                                                <input id="address" type="text" class="form-control" name="address" value="'.$relations->address.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="city" class="col-md-3 control-label">City</label>
                                            <div class="col-md-8">
                                                <input id="city" type="text" class="form-control" name="city" value="'.$relations->city.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="state" class="col-md-3 control-label">State</label>
                                            <div class="col-md-8">
                                                <input id="state" type="text" class="form-control" name="state" value="'.$relations->state.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="zipcode" class="col-md-3 control-label">Zip Code</label>
                                            <div class="col-md-8">
                                                <input id="zipcode" type="text" class="form-control" name="zipcode" value="'.$relations->zipcode.'">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="default_price" class="col-md-3 control-label">Default Price</label>
                                            <div class="col-md-8"> '.

                Form::select('country',$countries , $relations->country , array('id' => 'country', 'class' => 'form-control'))

                . '    </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="status" class="col-md-3 control-label">Active ?</label>
                                        <div class="col-md-6"> '.
                Form::checkbox('status',$relations->id,$relations->status, array('id'=>'status'))
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

        try {

            $request['company_id'] = $this->comp_code;
            $request['admin_id'] = $this->user_id;
            $request['status'] = true;
            $request['type'] = 'LS'; //Local Supplier



            Relationship::create($request->all());

            $request->session()->flash('alert-success', $request['name'].' Added');
            $request->flash();

        }catch (\Exception $e)
        {
            DB::rollBack();
            $error = $e->getMessage();
            $request->session()->flash('alert-danger', $error.' '.$request['name'].' Not Saved');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Relations\SuppliersController@index');
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

            Relationship::find($id)->update($request->except('active'));
            Relationship::find($id)->update(['status'=>$request->active]);

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

        return redirect()->action('Backend\Inventory\Relations\SuppliersController@index');
    }


    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            Relationship::find($id)->delete();
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
