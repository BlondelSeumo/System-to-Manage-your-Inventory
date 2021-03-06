<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\AppLanguage;
use App\Models\Common\Category;
use App\Models\Common\NameTranslation;
use App\Models\Common\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Form;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public $comp_code;
    public $user_id;

    /**
     * CategoryController constructor.
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
        $locale = AppLanguage::where('locale',App::getLocale())->first();
        return view('backend.inventory.products.categoriesindex')->with('locale',$locale);
    }

    public function getCData()
    {
        $categories = Category::query()->where('company_id',$this->comp_code);


        return DataTables::of($categories)

            ->addColumn('status', function ($categories) {

                return Form::checkbox('status',$categories->id,$categories->status, array('id'=>'status','disabled'));
            })

            ->addColumn()

            ->addColumn('action', function ($categories) {

                return '<button id="editproject" data-toggle="modal" data-target="#editCategoryModal'.$categories->id.'"  type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="categories.data.delete/' . $categories->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" disabled><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    
                    <!-- editCategoryModal -->
                    
                    <div class="modal fade" id="editCategoryModal'.$categories->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                    <h4 class="modal-title">Edit Category Data</h4>
                                </div>
                                <form class="form-horizontal" role="form" action="admin.categories.edit/'.$categories->id.'" method="POST" >
                                
                                <div class="modal-body">
                                    
                                    
                                    <input type="hidden" name="_token" value="'. csrf_token().'">
                                    <input type="hidden" name="id" value="'.$categories->id.'">
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">' . trans('label.name'). '</label>
                                            <div class="col-md-9">
                                                <input id="name" type="text" class="form-control" name="name" value="'.$categories->name.'" required autofocus>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3">' . trans('label.glcode'). '</label>
                                            <div class="col-md-9">
                                                <input name="accNo" placeholder="Gl Code" class="form-control" type="text" id="accNo" value="'.$categories->accno.'" required>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="status" class="col-md-3 control-label">' . trans('label.status'). '</label>
                                        <div class="col-md-6"> '.
                Form::checkbox('status',$categories->id,$categories->status, array('id'=>'status'))
                .'
                                        </div>
                                        </div>
                                        
                                </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>';
            })
            ->rawColumns(['status','locale','action','title'])
            ->make(true);
    }

    public function add(Request $request)
    {
        DB::beginTransaction();

        $data = array();

        try {

            $ids = Category::create([
                'company_id' => $this->comp_code,
                'name' => Str::upper($request['name']),
                'status' => true,
                'locale' =>Config::get('app.locale'),
                'accno' =>$request['accno'],
                'admin_id' => $this->user_id
            ]);

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = 10;
            $data['table_name'] = 'categories';
            $data['locale'] = Config::get('app.locale');
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
        }catch (QueryException $e)
        {
            DB::rollBack();
            $error = $e->getMessage();
            $request->session()->flash('alert-danger', $error.' '.$request->input('name').' Not Saved');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Products\CategoryController@index');

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

            Category::where('id',$id)->update(['name'=>Str::upper($request['name']),'accNo' => $request->input('accNo'),
                'status' => $request->active]);

            NameTranslation::where('table_id',10)->where('data_id',$id)->update(['name'=>Str::upper($request['name'])]);

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

        return redirect()->action('Backend\Inventory\Products\CategoryController@index');
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            Category::find($id)->delete();
            NameTranslation::where('table_id',10)->where('data_id',$id)->delete();

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

    public function getsubcategory($id)
    {
        $subcategories = SubCategory::Select(DB::raw('CONCAT(name, " :: ", alias) AS name'), 'id')
            ->where('company_id',$this->comp_code)
            ->where('category_id',$id)
            ->pluck('name','id');

        return json_encode($subcategories);
    }
}
