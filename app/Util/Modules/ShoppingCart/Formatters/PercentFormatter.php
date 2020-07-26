<?php namespace app\Util\Modules\ShoppingCart\Formatters;

use app\Util\Contracts\ShoppingCart\Formatter;
use app\Util\Contracts\ShoppingCart\Percentage;

class PercentFormatter implements Formatter
{
    /**
     * Format an input to an output
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function format($value)
    {
        if ($value instanceOf Percentage) {
            $value = $value->toPercent();
        }

        return $value->int() . '%';
    }
}
