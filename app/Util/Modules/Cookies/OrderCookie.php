<?php namespace app\Util\Modules\Cookies;

use app\Util\Modules\Cookies\Base\AppCookie;

class OrderCookie extends AppCookie
{

    public $name = 'client_order';

    public $timespan = 300;
}