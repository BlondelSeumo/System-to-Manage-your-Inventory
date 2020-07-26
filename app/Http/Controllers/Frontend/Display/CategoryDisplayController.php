<?php

namespace App\Http\Controllers\Frontend\Display;

use App\Models\Common\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use app\Util\Modules\Categories\CategoriesRepository;

class CategoryDisplayController extends Controller
{

    protected $category;

    /**
     * @param CategoriesRepository $repository
     */
    public function __construct(CategoriesRepository $repository)
    {
        $this->category = $repository;
    }

    public function index($id)
    {

//        $products = Product::query()->where('company_id',get_frontend_company_id())
//            ->where('category_id',$id)->with('description')->get();

        $categories = $this->category->displayCategoryListing();

//        dd($categories);

        return view('frontend.english.display.categorydisplayindex')->with('products',$categories);
    }


    /**
     * Display the specified resource.
     * GET /categories/{id}
     *
     * @param Request $request
     * @param Category $category
     *
     * @return Response
     *
     */
    public function show($category_id, Request $request)
    {

        // retrieve the category id, and display all related products, regardless of sub-category
        $data = $this->category->displayCategoryAndRelatedProducts($category_id, $request);


        return view('frontend.english.display.categorydisplayindex')
            ->with('category', array_get($data, 'cat'))
            ->with('products', array_get($data, 'pages'));
    }
}
