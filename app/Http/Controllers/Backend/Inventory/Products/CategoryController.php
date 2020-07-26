<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\AppLanguage;
use App\Models\Common\Category;
use App\Models\Common\Company;
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
use Symfony\Component\HttpKernel\Exception\HttpException;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public $comp_code;
    public $user_id;
    public $locale;

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
        $locale = AppLanguage::where('locale',get_locale())->first();
        $locales = AppLanguage::where('locale','<>',get_locale())->pluck('name','locale');

        return view('backend.inventory.products.categoriesindex')->with('locale',$locale)
            ->with('locales',$locales);

    }

    public function getCData()
    {
        $categories = Category::query()->where('company_id',$this->comp_code);


        return DataTables::of($categories)

            ->addColumn('status', function ($categories) {

                return Form::checkbox('status',$categories->id, $categories->status, array('id'=>'status','disabled'));
            })

            ->addColumn('title', function ($categories) {
                return $categories->titles->map(function($categories) {
                    return $categories->name;
                })->implode('<br>');
            })

            ->addColumn('action', function ($categories) {

                return '<button data-remote="backend.categories.modaldata/'.$categories->id.'"  type="button" class="btn btn-edit btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="categories.data.delete/' . $categories->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" disabled><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    ';
            })
            ->rawColumns(['status','action','title'])
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
                'locale' => get_locale(),
                'accno' =>$request['accno'],
                'admin_id' => $this->user_id
            ]);

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = 10;
            $data['table_name'] = 'categories';
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

    public function update(Request $request)
    {
        DB::beginTransaction();

        try{

            if(empty($request->status))
            {
                $request['active'] = false;

            }else{
                $request['active'] = true;
            }

            Category::where('id',$request['id'])->update(['name'=>Str::upper($request['name']),'accno' => $request->input('accno'),
                'status' => $request['active']]);

            NameTranslation::where('table_id',10)->where('data_id',$request['id'])
                ->where('locale',get_locale())->update(['name'=>Str::upper($request['name'])]);

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

    public function modaldata($id)
    {
        $data = Category::query()->where('id',$id)
            ->where('company_id',$this->comp_code)
            ->with('titles')->get();

        return json_encode($data);
    }

    public function newlocate(Request $request)
    {
        DB::beginTransaction();

        try {

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = '10';
            $data['table_name'] = 'categories';
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
