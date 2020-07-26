<?php namespace app\Util\Modules\Cookies;

use app\Util\Modules\Cookies\Base\AppCookie;

class CheckOutCookie extends AppCookie
{

    public $name = 'checkout';

    public $timespan = 300;
}