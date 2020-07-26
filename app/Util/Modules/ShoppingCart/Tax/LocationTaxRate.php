<?php namespace app\Util\Modules\ShoppingCart\Tax;

use app\Util\Contracts\ShoppingCart\TaxRate;

class LocationTaxRate implements TaxRate
{

    /**
     * @var float
     */
    private $rate;

    /**
     * Create a new Tax Rate
     *
     */
    public function __construct()
    {
        $this->rate = config('site.products.VAT', 0.16);
    }

    /**
     * Return the Tax Rate as a float
     *
     * @return float
     */
    public function float()
    {
        return $this->rate;
    }

    /**
     * Return the Tax Rate as a percentage
     *
     * @return int
     */
    public function percentage()
    {
        return intval($this->rate * 100);
    }
}