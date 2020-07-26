<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\AppLanguage;
use App\Models\Common\Category;
use App\Models\Common\NameTranslation;
use App\Models\Common\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Form;

class SubcategoryController extends Controller
{

    public $comp_code;
    public $user_id;

    /**
     * SubcategoryController constructor.
     * @param $comp_code
     * @param $user_id
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

//        $categories = Category::where('company_id',$this->comp_code)->pluck('name','id');

        $categories = NameTranslation::where('company_id',$this->comp_code)
            ->where('table_id',10)->where('locale',get_locale())
            ->pluck('name','id');

//        dd($categories);

        $locale = AppLanguage::where('locale',get_locale())->first();
        $locales = AppLanguage::where('locale','<>',get_locale())->pluck('name','locale');

        return view('backend.inventory.products.subcategoriesindex',compact('categories','locale','locales'));
    }

    public function getSCData()
    {
        $subcategories = SubCategory::query()->where('company_id',$this->comp_code)->with('category');

//        $subcategories = SubCategory::query()->where('company_id',$this->comp_code);


        return DataTables::of($subcategories)
            ->addColumn('status', function ($subcategories) {

                return Form::checkbox('status',$subcategories->id,$subcategories->status, array('id'=>'status','disabled'));
            })

            ->addColumn('title', function ($subcategories) {
                return $subcategories->titles->map(function($subcategories) {
                    return $subcategories->name;
                })->implode('<br>');
            })

            ->addColumn('action', function ($subcategories) {

                return '<button data-remote="backend.subcategories.modaldata/'.$subcategories->id.'"  type="button" class="btn btn-edit btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="subcategories.data.delete/' . $subcategories->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" disabled><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    ';
            })


//            ->addColumn('action', function ($subcategories) {
//
//
//                return '<button id="editproject" data-toggle="modal" data-target="#editCategoryModal'.$subcategories->id.'"  type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
//                    <button data-remote="admin.subcategories.delete/' . $subcategories->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" ><i class="glyphicon glyphicon-remove"></i>Delete</button>
//
//                    <!-- editCategoryModal -->
//
//                    <div class="modal fade" id="editCategoryModal'.$subcategories->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
//                        <div class="modal-dialog">
//                            <div class="modal-content">
//                                <div class="modal-header">
//                                    <button type="button" class="close" data-dismiss="modal">x</button>
//                                    <h4 class="modal-title">Edit Category Data</h4>
//                                </div>
//                                <form class="form-horizontal" role="form" action="admin.subcategories.edit/'.$subcategories->id.'" method="POST" >
//                                <div class="modal-body">
//
//
//                                    <input type="hidden" name="_token" value="'. csrf_token().'">
//                                    <input type="hidden" name="id" value="'.$subcategories->id.'">
//                                        <div class="form-group">
//                                            <label for="name" class="col-md-3 control-label">Student Name</label>
//                                            <div class="col-md-9">
//                                                <input id="name" type="text" class="form-control" name="name" value="'.$subcategories->name.'" required autofocus>
//                                            </div>
//                                        </div>
//
//                                        <div class="form-group">
//                                            <label class="control-label col-md-3">Alias</label>
//                                            <div class="col-md-9">
//                                                <input name="alias" placeholder="Alias" class="form-control" type="text" id="alias" value="'.$subcategories->alias.'" required>
//
//                                            </div>
//                                        </div>
//
//                                        <div class="form-group">
//                                        <label for="status" class="col-md-3 control-label">Active ?</label>
//                                        <div class="col-md-6"> '.
//                Form::checkbox('status',$subcategories->id,$subcategories->status, array('id'=>'status'))
//                .'
//                                        </div>
//                                        </div>
//
//                                    </div>
//                                    <div class="modal-footer">
//                                        <button type="submit" class="btn btn-primary">Save changes</button>
//                                        <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
//                                    </div>
//                                </form>
//                            </div>
//                        </div>
//                    </div>';
//            })
            ->rawColumns(['status','action','title'])
            ->make(true);
    }

    public function add(Request $request)
    {
        DB::beginTransaction();

        try {

            $ids = SubCategory::create([
                'company_id' => $this->comp_code,
                'category_id' => $request['category_id'],
                'name' => Str::ucfirst($request['name']),
                'alias' => $request['alias'],
                'locale' => get_locale(),
                'admin_id' => $this->user_id
            ]);

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = 11;
            $data['table_name'] = 'sub_categories';
            $data['locale'] = get_locale();
            $data['data_id'] = $ids->id;
            $data['name'] = Str::upper($request['name']);
            $data['description'] = $request['name'];

            NameTranslation::create($data);

            $request->session()->flash('alert-success', $request['name'].' Added');
            $request->flash();

        }catch (\Exception $e)
        {
            DB::rollBack();
            $error = $e->getMessage();
            $request->session()->flash('alert-danger', $error.' '.$request->input('name').' Not Saved');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Products\SubcategoryController@index');

    }

    public function update(Request $request)
    {

//        dd($request);

        DB::beginTransaction();

        try{

            if(empty($request->status))
            {
                $request->request->add(['active'=>false]);

            }else{
                $request->request->add(['active'=>true]);
            }

//            SubCategory::where('id',$id)->update(['name'=>$request->input('name'),'alias' => $request->input('alias'),'status'=>$request->active]);

            SubCategory::where('id',$request['id'])->update(['name'=>Str::upper($request['name']),
                'status' => $request['active']]);

            NameTranslation::where('table_id',11)->where('data_id',$request['id'])
                ->where('locale',get_locale())->update(['name'=>Str::upper($request['name'])]);


            $request->session()->flash('alert-success', 'Successfully Updated');

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

        return redirect()->action('Backend\Inventory\Products\SubcategoryController@index');
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            SubCategory::find($id)->delete();
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

        return;
    }

    public function autocomplete(Request $request)

    {

        $term = Input::get('term');

        $items = SubCategory::select('alias')
            ->where('company_id',$this->comp_code)
            ->where('alias', 'LIKE', '%'.$term.'%')->distinct()->get(['alias']);

        return response()->json($items);


//        $term = Input::get('term');
//        $results = array();
//
//        $queries = SubCategory::where('company_id',$this->comp_code)
//            ->where('alias', 'LIKE', '%'.$term.'%')
//            ->distinct()->get(['alias']);
//
//
//        if(count($queries))
//        {
//            foreach ($queries as $query)
//            {
//                $results[] = [ 'id' => $query->id, 'value' => $query->alias ];
//            }
//        }else
//        {
//            $results[] = ['value'=>'No Result Found','id'=>''];
//        }
//
//        return response()->json($results);

    }

    public function getCategoryaslocale($locale)
    {

        $categories = Category::where('company_id',$this->comp_code)
            ->where('locale',$locale)
            ->pluck('name','id');

        return json_encode($categories);
    }

    public function modaldata($id)
    {
        $data = SubCategory::query()->where('id',$id)
            ->where('company_id',$this->comp_code)
            ->with('titles')->get();

        return json_encode($data);
    }

    public function newlocate(Request $request)
    {
        DB::beginTransaction();

        try {

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = '11';
            $data['table_name'] = 'sub_categories';
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
        return redirect()->action('Backend\Inventory\Products\SubcategoryController@index');
    }
}
