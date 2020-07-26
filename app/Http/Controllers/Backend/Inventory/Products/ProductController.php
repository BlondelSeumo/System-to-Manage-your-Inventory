<?php

namespace App\Http\Controllers\Backend\Inventory\Products;

use App\Models\Common\AppLanguage;
use App\Models\Common\Brand;
use App\Models\Common\Category;
use App\Models\Common\Color;
use App\Models\Common\Description;
use App\Models\Common\NameTranslation;
use App\Models\Common\Product;
use App\Models\Common\ProductModel;
use App\Models\Common\Relationship;
use App\Models\Common\Size;
use App\Models\Common\SubCategory;
use App\Models\Common\Tax;
use App\Models\Common\Unit;
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
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class ProductController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * ProductController constructor.
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
//        $data = Product::query()->where('company_id',$this->comp_code)
//            ->with('category')->with('description')->with('titles')->get();
////
//        dd($data);


        $categories = Category::where('company_id',$this->comp_code)->pluck('name','id');

        $subcategories = SubCategory::select(DB::raw('CONCAT(name, ", ", alias) AS name'), 'id')
                            ->where('company_id',$this->comp_code)->pluck('name','id');

        $brands = Brand::where('company_id',$this->comp_code)->pluck('name','id');

        $units = Unit::where('company_id',$this->comp_code)->pluck('formal_name','name');

        $sizes = Size::select(DB::raw('CONCAT(size, ", ", description) AS size'), 'id')
                ->where('company_id',$this->comp_code)->pluck('size','id');

        $models = ProductModel::where('company_id',$this->comp_code)->pluck('name','id');

        $taxes = Tax::where('company_id',$this->comp_code)->pluck('name','id');

        $colors = Color::where('company_id',$this->comp_code)->pluck('name','id');
        $locales = AppLanguage::query()->where('locale','<>',config('site.locale'))->pluck('name','locale');

        return view('backend.inventory.products.productindex')->with('categories',$categories)->with('brands',$brands)
            ->with('units',$units)->with('sizes',$sizes)
            ->with('models',$models)->with('taxes',$taxes)
            ->with('colors',$colors)->with('subcategories',$subcategories)
            ->with('locales',$locales);
    }

    public function getPDTData()
    {
        $products = Product::query()->where('company_id',$this->comp_code)
            ->with('category')->with('subcategory')->with('brand')->with('titles')->select('products.*');


        return DataTables::of($products)
            ->addColumn('status', function ($products) {

                return Form::checkbox('status',$products->id,$products->status, array('id'=>'status','disabled'));
            })

            ->editColumn('showimage', function ($products) {
                if (!isset($products->image)) {
                    return "";
                }
                return '<img src="' . $products->image .
                '" alt=" " style="height: 60px; width: 40px;" >';
            })

            ->addColumn('title', function ($products) {
                return $products->titles->map(function($titles) {
                    return $titles->name;
                })->implode('<br>');
            })

            ->addColumn('action', function ($products) {

                return '<button data-remote="product/ajax_details/' . $products->id . '" type="button" class="btn btn-xs btn-edit btn-primary"><i class="fa fa-edit"></i> Edit</button>
                <button data-remote="product.delete/' . $products->id . '" type="button" class="btn btn-xs btn-delete btn-danger pull-right" disabled ><i class="fa fa-remove"></i>Del</button>
                ';
            })
            ->rawColumns(['status','locale','action','title','showimage'])
            ->make(true);
    }

    public function createIndex()
    {
        $categories = Category::where('company_id',$this->comp_code)
            ->pluck('name','id');

        $subcategories = SubCategory::select(DB::raw('CONCAT(name, " :: ", alias) AS name'), 'id')
            ->where('company_id',$this->comp_code)->pluck('name','id');

        $brands = Brand::where('company_id',$this->comp_code)
            ->pluck('name','id');
//        $brands = $brands->toArray();


        $units = Unit::where('company_id',$this->comp_code)->pluck('formal_name','name');
//        $units = $units->toArray();


        $sizes = Size::select(DB::raw('CONCAT(size, " :: ", description) AS size'), 'id')
            ->where('company_id',$this->comp_code)->pluck('size','id');
//        $sizes = $sizes->toArray();

        $models = ProductModel::where('company_id',$this->comp_code)
            ->pluck('name','id');
//        $models = $models->toArray();

        $taxes = Tax::where('company_id',$this->comp_code)
            ->pluck('name','id');

        $colors = Color::where('company_id',$this->comp_code)
            ->pluck('name','id');

        $locales = AppLanguage::where('locale','<>',App::getLocale())->pluck('name','locale');


//        $godowns = Godown::where('compCode',Auth::user()->compCode)
//            ->pluck('godownName','id');
//
//        $racks = Rack::where('compCode',Auth::user()->compCode)
//            ->pluck('name','id');
//
//        $suppliers = Relationship::where('compCode',Auth::user()->compCode)
//            ->where('type','S')->pluck('name','id');

        return view('backend.inventory.products.addproductindex')
            ->with('categories',$categories)->with('brands',$brands)
            ->with('units',$units)->with('sizes',$sizes)
            ->with('models',$models)->with('taxes',$taxes)
            ->with('colors',$colors)->with('subcategories',$subcategories)
            ->with('locales',$locales);
    }

    public function store(Request $request)
    {
        $file = Input::file('imagePath');

        $scname = SubCategory::where('company_id',$this->comp_code)->where('id',$request['subcategory_id'])->first();
        $pid = Product::where('company_id',$this->comp_code)->max('id');

        if(!empty($pid))
        {
            $slno  = $pid + 1;
        }else
        {
            $slno = 1;
        }

        if(!empty($file)) {

//            $filename = Input::file('imagePath')->getClientOriginalName();
            $filename = $scname->alias.$scname->name.$slno;

            Input::file('imagePath')->move('images/products/', $filename);
            $request['image'] =  '/images/products/'.$filename;
        }


        DB::beginTransaction();

        $maxCode = Product::where('company_id',$this->comp_code)
            ->max('product_code');

        if(!empty($maxCode))
        {
            $prdCode = $maxCode + 1;
        }
        else
        {
            $prdCode = '200001';
        }



        $request['product_code'] = $prdCode;
        $request['admin_id'] = $this->user_id;
        $request['company_id'] = $this->comp_code;
        $request['locale'] = get_locale();


        $data = array();

        try {

            $ids  = Product::create($request->except('imagePath'));

            $data['company_id'] = $this->comp_code;
            $data['table_id'] = '99';
            $data['table_name'] = 'products';
            $data['locale'] = get_locale();
            $data['data_id'] = $ids->id;
            $data['name'] = $request['name'];
            $data['description'] = 'Product Name';

            NameTranslation::create($data);

            $request->session()->flash('alert-success', $request->input('name').' Added');

        }catch (\Exception $e)
        {
            DB::rollBack();
            $error = $e->getMessage();
            $request->session()->flash('alert-danger', $error.' '.$request->input('name').' Not Saved');
            return redirect()->back()->withInput();
        }catch (QueryException $e)
        {
            DB::rollBack();
            $error = $e->getMessage();
            $request->session()->flash('alert-danger', $error.' '.$request->input('name').' Not Saved');
            return redirect()->back()->withInput();
        }

        DB::commit();


        return redirect()->action('Backend\Inventory\Products\ProductController@index');
    }

    public function details($id)
    {
        $data = Product::query()->where('id',$id)
            ->where('company_id',$this->comp_code)
            ->with('description')->with('titles')->get();

        session()->put('prod_id', $id);

        return json_encode($data);
    }

    public function update(Request $request)
    {
//        dd($request);
//        $request['onhand']

//        $request['price'] = $request['retail_price'];
        Product::where('id',$request['id'])->update($request->except('_token'));

        if($request['name'])
        {
            NameTranslation::where('table_id','99')->where('data_id',$request['id'])->where('locale',get_locale())
                ->update(['name'=>$request['name']]);
        }

        if($request['opening_qty'])
        {
            Product::where('id',$request['id'])->increment('onhand',$request['opening_qty']);
        }


        $request->session()->flash('alert-success', 'Updated');
        return redirect()->action('Backend\Inventory\Products\ProductController@index');
    }

    public function addtitle(Request $request)
    {
//        dd($request);

        $data['company_id'] = $this->comp_code;
        $data['table_id'] = '99';
        $data['table_name'] = 'products';
        $data['locale'] = $request['locale'];
        $data['data_id'] = $request['id'];
        $data['name'] = $request['name'];
        $data['description'] = $request['description'];

        NameTranslation::create($data);

        $request->session()->flash('alert-success', 'Updated');
        return redirect()->action('Backend\Inventory\Products\ProductController@index');
    }


    public function descriptionindex(Request $request)
    {

        $descdata = '';
        $product = '';
        $notedata = '';

        if(!empty($request['id']))
        {
            $descdata = Description::query()->where('product_id',$request['id'])
                ->where('company_id',$this->comp_code)
                ->where('desc_type',1)->get();

            $notedata = Description::query()->where('product_id',$request['id'])
                ->where('company_id',$this->comp_code)
                ->where('desc_type',2)->first();

            $product = Product::query()->where('id',$request['id'])->first();

//            dd($descdata);

        }

        return view('backend.inventory.products.productdescriptionindex')->with('descdata',$descdata)
            ->with('notedata',$notedata)->with('product',$product);
    }

    public function autocomplete()
    {
        $term = Input::get('term');

        $items = Product::select('id as item_id', 'name','tax_id','unit_price')
            ->where('company_id',$this->comp_code)
            ->where('name', 'LIKE', '%'.$term.'%')->get();

        return response()->json($items);
    }

    public function descriptionpost(Request $request)
    {

        $data = $request->all();

        for($i=0; $i<count($data['description']); $i++)
        {
            if(Str::length($data['description'][$i])> 0)
            {
                Description::updateOrCreate(
                    ['id'=> $data['rowid'][$i]],
                    ['company_id'=>$this->comp_code,
                    'desc_type'=>1,
                    'product_id'=>$data['product_id'],
                    'description' =>$data['description'][$i],
                    'status'=>true,
                    'admin_id'=>$this->user_id
                ]);
            }
        }

        if(Str::length($request['spnote'])> 0)
        {
            Description::updateOrCreate(
                ['id'=> $request['lineid']],
                ['company_id'=>$this->comp_code,
                'desc_type'=> 2,
                'product_id'=>$request['product_id'],
                'description' =>$request['spnote'],
                'status'=>true,
                'admin_id'=>$this->user_id
            ]);
        }

        $request->session()->flash('alert-success', 'Successfully Completed');
        return redirect()->action('Backend\Inventory\Products\ProductController@descriptionindex');

    }

    public function totalproduct()
    {
        $input_items = request('item');
        $paid = request('paid_amt')*100;
        $discount = request('discount')*100;

        $currency_code = get_company_currency();

        $currencies = new ISOCurrencies();
        $numberFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
//        new NumberFormatter('nl_NL', NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

//        $zero = $numberFormatter->getSymbol(\NumberFormatter::ZERO_DIGIT_SYMBOL);


        $json = new \stdClass;

        $sub_total = 0;
        $tax_total = 0;

        $items = array();

        if ($input_items) {
            foreach ($input_items as $key => $item) {
                $item_tax_total= 0;
                $item_sub_total = ($item['price'] * $item['quantity']*100); //Money function gets last two digit as decimal

                if (!empty($item['tax'])) {
                    $tax = Tax::where('id', $item['tax'])->first();


                    if($tax->calculating_mode == 'P')
                    {
                        $item_tax_total = (($item['price'] * $item['quantity']) / 100)*100 * $tax->rate;
                    }

                    if($tax->calculating_mode == 'F')
                    {
                        $item_tax_total = $item['quantity']*$tax->rate*100;
                    }

                }
//
                $sub_total += $item_sub_total;
                $tax_total += $item_tax_total;

                $total = $item_sub_total + $item_tax_total;


                $money = new Money($total, new Currency($currency_code));

                $moneyFormatter->format($money);

                $items[$key] = $moneyFormatter->format($money);
            }
        }

        $json->items = $items;

        $sub_total = new Money($sub_total, new Currency($currency_code));

        $json->sub_total = $moneyFormatter->format($sub_total);

        $tax_total = new Money($tax_total, new Currency($currency_code));

        $json->tax_total = $moneyFormatter->format($tax_total);

        $grand_total = $sub_total->add($tax_total);

        $json->grand_total = $moneyFormatter->format($grand_total);

        if($paid + $discount > 0)
        {
            $paid_amt = new Money($paid, new Currency($currency_code));
            $discount_amt = new Money($discount, new Currency($currency_code));

            $due_amt = $grand_total->subtract($paid_amt);
            $due_amt = $due_amt->subtract($discount_amt);
            $json->due_amt = $moneyFormatter->format($due_amt);
        }else
        {
            $json->due_amt = $moneyFormatter->format($grand_total);
        }

        return response()->json($json);
    }
}
