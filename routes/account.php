<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 12/15/17
 * Time: 1:04 AM
 */

Route::group(['prefix' => 'accounts', 'namespace' => 'Backend', 'middleware' => ['guest']], function () {

    Route::get('/',['as' => 'accounts', 'uses' => 'Auth\LoginController@getLoginForm']);
    Route::post('authenticate', 'Auth\LoginController@accounts');

});


Route::group(['prefix' => 'accounts', 'namespace' => 'Backend', 'middleware' => ['admin']], function () {

    Route::get('home',['as' => 'accounts.home', 'uses' => 'Auth\AdminController@accountindex']);
    Route::post('logout', 'Auth\LoginController@getLogout');

    Route::get('company/index',['as' => 'companyconfig', 'uses' => 'Account\Basic\CompanyController@index']);

    Route::post('company/config',['as' => 'companyconfigsave', 'uses' => 'Account\Basic\CompanyController@saveconfig']);

});