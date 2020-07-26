<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 11/18/17
 * Time: 10:21 PM
 */

function get_trans_numbers($tr_code)
{
    $tr_number = \App\Models\Common\TransCode::where('company_id',Auth::guard('admin')->user()->company_id)
        ->where('trans_code',$tr_code)->value('lastid');

    \App\Models\Common\TransCode::where('company_id',Auth::guard('admin')->user()->company_id)
        ->where('trans_code',$tr_code)
        ->increment('lastid',1);

    return $tr_number;
}

function get_currency()
{
    $currency = \App\Models\Common\Company::where('id',Auth::guard('admin')->user()->company_id)
        ->value('currency');

    return $currency;
}

function get_locale()
{
    $locale = \App\Models\Common\Company::where('id',Auth::guard('admin')->user()->company_id)
        ->value('locale');

    return $locale;
}

function get_root_url()
{
    $rooturl = \Illuminate\Support\Facades\Request::root();

    return $rooturl;

}

function get_frontend_company_id()
{
    $rooturl = \Illuminate\Support\Facades\Request::root();
    $comp_id = \App\Models\Common\Company::where('rooturl',$rooturl)->first();

    return $comp_id->id;
}

function get_currency_list()
{
    $currency = \App\Models\Common\Country::whereNotIn('currency',['NULL'])
        ->pluck('currency','currencycode_a');

    return $currency;
}