<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Common\Category;
use App\Models\Common\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {


//        $rooturl = \Illuminate\Support\Facades\Request::root();


        $categories = Category::where('company_id',1)->orderBy('id')->limit(8)->get();
        $subcategories = SubCategory::where('locale','en')->get();
        $sbcalias = DB::select('select distinct alias, category_id from sub_categories');

//
//        $brands = Brand::get()->random(6);
//
//        $products = Product::with(['reviews', 'brand','subcategory'])->get()->random(20);
//
////        dd($products);
//
//        $time = Carbon::now()->subDays(config('site.products.new.age', 114));
//
//        $newprods = Product::with(['reviews', 'brand'])->where('created_at', '>=', $time)->get()->random(20);
//
//
//
//        $sbcalias = DB::select('select distinct alias, category_id from sub_categories');

//        dd($sbcalias);

//        return view('welcome')->with('categories',$categories)->with('subcategories',$subcategories)
//            ->with('sbcalias',$sbcalias)->with('brands',$brands)->with('products',$products)
//            ->with('newprods',$newprods);

//        return view('welcomeenglish')->with('categories',$categories)
//            ->with('subcategories',$subcategories)
//            ->with('sbcalias',$sbcalias);
//
        return view('welcome')->with('categories',$categories)
            ->with('subcategories',$subcategories)
            ->with('sbcalias',$sbcalias);


    }

    public function langselect($lang)
    {
        switch ($lang)
        {
            case 'bn-BD':
                $categories = Category::where('locale','bn-BD')->limit(8)->get();
                $subcategories = SubCategory::where('locale','bn-BD')->get();
                $sbcalias = DB::select('select distinct alias, category_id from sub_categories');
                return view('welcomebangla')->with('categories',$categories)->with('subcategories',$subcategories)
                    ->with('sbcalias',$sbcalias);
                break;
            case 'en-US':
                $categories = Category::where('locale','en-US')->limit(8)->get();
                $subcategories = SubCategory::where('locale','en-US')->get();
                $sbcalias = DB::select('select distinct alias, category_id from sub_categories');
                return view('welcomeenglish')->with('categories',$categories)->with('subcategories',$subcategories)
                    ->with('sbcalias',$sbcalias);
                break;
            default:
                $categories = Category::where('locale','en-US')->limit(8)->get();
                $subcategories = SubCategory::where('locale','en-US')->get();
                $sbcalias = DB::select('select distinct alias, category_id from sub_categories');
                return view('welcomeenglish')->with('categories',$categories)->with('subcategories',$subcategories)
                    ->with('sbcalias',$sbcalias);
                break;
        }
    }
}
