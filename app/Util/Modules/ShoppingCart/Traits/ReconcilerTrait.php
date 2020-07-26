<?php namespace app\Util\Modules\ShoppingCart\Traits;

use app\Util\Modules\Product\Traits\ProductReconciler;
use app\Util\Modules\ShoppingCart\Base\ShoppingCartReconciler;

trait ReconcilerTrait
{
    // include both the product and shopping cart reconciler classes
    use ProductReconciler, ShoppingCartReconciler;
}