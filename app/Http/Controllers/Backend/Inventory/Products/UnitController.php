<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\AppLanguage;
use App\Models\Common\NameTranslation;
use App\Models\Common\Unit;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Form;

class UnitController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * UnitController constructor.
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
//        $locale = AppLanguage::where('locale',get_locale())->first();
        $locales = AppLanguage::where('locale','<>',get_locale())->pluck('name','locale');

        return view('backend.inventory.products.unitindex')->with('locales',$locales);
    }


    public function getUnitData()
    {
        $units = Unit::query()->where('company_id',$this->comp_code);;


        return DataTables::of($units)

            ->addColumn('title', function ($units) {
                return $units->titles->map(function($units) {
                    return $units->name;
                })->implode('<br>');
            })

            ->addColumn('action', function ($units) {

                return '<button data-remote="backend.unit.modaldata/'.$units->id.'"  type="button" class="btn btn-edit btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="admin.unit.delete/' . $units->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" disabled><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    ';
            })
            ->rawColumns(['status','action','title'])
            ->make(true);
    }

    public function add(Request $request)
    {

        DB::beginTransaction();

        $data = array();
//
        try {

            $ids = Unit::create([
                'company_id'=>$this->comp_code,
                'locale' => get_locale(),
                'name' => Str::upper($request->input('name')),
                'formal_name' => $request->input('formal_name'),
                'no_of_decimal_places' =>$request->input('no_of_decimal_places'),
                'admin_id' => $this->user_id
            ]);

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = 12;
            $data['table_name'] = 'units';
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

        return redirect()->action('Backend\Inventory\Products\UnitController@index');
    }

    public function modaldata($id)
    {
        $data = Unit::query()->where('id',$id)
            ->where('company_id',$this->comp_code)
            ->with('titles')->get();

        return json_encode($data);
    }

    public function update(Request $request)
    {

        DB::beginTransaction();

        try{

            Unit::where('id',$request['id'])->update(['name'=>Str::upper($request->input('name')),'formal_name'=>$request->formal_name,'no_of_decimal_places'=>$request->no_of_decimal_places]);

            NameTranslation::where('table_id',12)->where('data_id',$request['id'])
                ->where('locale',get_locale())->update(['name'=>Str::upper($request['name'])]);

            $request->session()->flash('alert-success', 'Updated');

        }catch (HttpException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-success', $request->name.' Not updated');
            return redirect()->back();
        }catch (QueryException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-success', $request->name.' Not updated');
            return redirect()->back()->withInput();
        }

        DB::commit();

        return redirect()->action('Backend\Inventory\Products\UnitController@index');
    }


    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            Unit::find($id)->delete();
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
            $data['table_id'] = '12';
            $data['table_name'] = 'units';
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
        return redirect()->action('Backend\Inventory\Products\UnitController@index');
    }
}
