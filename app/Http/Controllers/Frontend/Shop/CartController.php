<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Http\Requests\ShoppingCartRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Util\Modules\ShoppingCart\Base\Main\Basket as ShoppingCartEntity;


class CartController extends Controller
{
    /**
     * @var ShoppingCartEntity
     */
    private $shoppingCart;

    /**
     * @param ShoppingCartEntity $shoppingCart
     */
    public function __construct(ShoppingCartEntity $shoppingCart)
    {
        $this->middleware('cart.check', ['except' => ['store']]);

        $this->shoppingCart = $shoppingCart;

        $this->useOverlay = true;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.english.cart.index');
    }

    /**
     * @param ShoppingCartRequest $request
     * @param $product
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function store(ShoppingCartRequest $request, $product)
    {
        $this->data = $this->shoppingCart->add($product, $request->get('quantity', 1));

        $this->setSuccessMessage("The product was added to your shopping cart");

//        dd($request);

        return $this->handleRedirect($request, route('cart.view'));
    }

    /**
     * Allows the user to view the items in their shopping cart
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function view()
    {
        // since the data will be available due to the view composer, we just display this page
//        dd('here');
        return view('frontend.english.cart.products');
    }

    /**
     * @param ShoppingCartRequest $request
     * @param $product
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function update(ShoppingCartRequest $request, $product)
    {
        $this->data = $this->shoppingCart->updateBasket($product, $request->get('quantity', 1), false);

        $this->setSuccessMessage("Your shopping cart was successfully updated");

        return $this->handleRedirect($request);
    }

    /**
     * @param Request $request
     * @param $product
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeProduct(Request $request, $product)
    {
        $this->data = $this->shoppingCart->removeProduct($product);

        $this->setSuccessMessage("The product was removed from your shopping cart");

        return $this->handleRedirect($request);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function removeAllProducts(Request $request)
    {
        $this->data = $this->shoppingCart->makeItEmpty();

//        dd($request);

        return $this->handleRedirect($request);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getMine()
    {
        return $this->featureUnavailable();
    }
}
