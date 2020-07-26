<?php

namespace App\Http\Controllers\Frontend\Display;

use App\Models\Common\Product;
use App\Models\Frontend\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
        $products=Product::where('subcategory_id',$id)->get();



        return view('frontend.products.index')->with('products',$products);
    }

    public function productDetails(Product $p, $id)
    {

        $reviewed = null;
//        dd($id);

        if(Auth::guard('user')->check())
        {
            $reviewed = Review::where('user_id',Auth::guard('user')->user()->id)->where('product_id',$id)->value('id');
        }


        $product = $p::with('category', 'subcategory', 'brand', 'reviews.user')->where('id',$id)->first();

        return view('frontend.english.display.singleproductindex', compact('product','reviewed'));

    }
}
