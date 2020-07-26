<?php namespace app\Util\Modules\ShoppingCart\Discounts;


use app\Util\Contracts\ShoppingCart\Discount;
use app\Util\Contracts\ShoppingCart\Percentage;
use app\Util\Modules\ShoppingCart\Percent;
Use App\Models\Common\Product;

class PercentageDiscount implements Discount, Percentage
{
    /**
     * @var int
     */
    private $rate;

    /**
     * Create a new Discount
     *
     * @param int $rate
     *
     * @return void
     */
    public function __construct($rate)
    {
        $this->rate = $rate;
    }


    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function product(Product $product)
    {
        return $product->unit_price->multiply($this->rate / 100);
    }

    /**
     * Return the rate of the Discount
     *
     * @return mixed
     */
    public function rate()
    {
        return new Percent($this->rate);
    }

    /**
     * Return the object as a Percent
     *
     * @return Percent
     */
    public function toPercent()
    {
        return new Percent($this->rate);
    }
}
