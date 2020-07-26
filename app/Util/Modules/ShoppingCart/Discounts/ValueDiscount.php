<?php namespace app\Util\Modules\ShoppingCart\Discounts;


use app\Util\Contracts\ShoppingCart\Discount;
use app\Util\Contracts\ShoppingCart\MoneyInterface;
use App\Models\Common\Product;
use Money\Money;

class ValueDiscount implements Discount, MoneyInterface
{
    /**
     * @var Money
     */
    private $rate;

    /**
     * Create a new Discount
     *
     * @param Money $rate
     *
     * @return void
     */
    public function __construct(Money $rate)
    {
        $this->rate = $rate;
    }

    public function product(Product $product)
    {
        return $this->rate;
    }

    /**
     * Return the rate of the Discount
     *
     * @return mixed
     */
    public function rate()
    {
        return $this->rate;
    }

    /**
     * Return the object as an instance of Money
     *
     * @return Money
     */
    public function toMoney()
    {
        return $this->rate;
    }
}
