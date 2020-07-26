<?php namespace app\Util\Contracts\ShoppingCart;

use app\Util\Modules\ShoppingCart\Percent;

interface Percentage
{

    /**
     * Return the object as a Percent
     *
     * @return Percent
     */
    public function toPercent();
}