<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 12/12/17
 * Time: 11:28 PM
 */

namespace App\Traits;


use Illuminate\Support\Facades\Input;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait
{
    public function captchaCheck()
    {
        $response = Input::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAP_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }
    }

}