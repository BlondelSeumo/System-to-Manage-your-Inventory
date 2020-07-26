<?php namespace app\Util\Contracts\ShoppingCart;

use App\Models\Common\Product;
use Money\Money;

interface Discount
{
    /**
     * Calculate the discount on a Product
     *
     * @param Product
     *
     * @return Money
     */
    public function product(Product $product);

    /**
     * Return the rate of the Discount
     *
     * @return mixed
     */
    public function rate();
}
