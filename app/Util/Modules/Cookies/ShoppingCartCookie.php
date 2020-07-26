<?php namespace app\Util\Modules\Cookies;

use app\Util\Modules\Cookies\Base\AppCookie;

class ShoppingCartCookie extends AppCookie
{

    public $name = 'shopping_cart';

    public $timespan = 3600;
}