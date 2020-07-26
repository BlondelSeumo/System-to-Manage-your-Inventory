<?php

namespace App\Http\Middleware;

use Closure;
use app\Util\Modules\ShoppingCart\Base\Main\Basket as ShoppingCartEntity;

class VerifyShoppingCart
{
    /**
     * The shopping cart
     *
     * @var ShoppingCartEntity
     */
    private $shoppingCart;

    /**
     * @param ShoppingCartEntity $cart
     */
    public function __construct(ShoppingCartEntity $cart)
    {
        $this->shoppingCart = $cart;
    }

    /**
     * Checks that a user has a shopping cart, and that it has products. Useful for checking out
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // check if the shopping cart has any items


        if ($this->shoppingCart->hasProducts()) {

            return $next($request);
        }

        return response()->view('frontend.english.cart.index');
    }
}
