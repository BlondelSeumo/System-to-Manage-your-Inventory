<?php

namespace App\Providers;

use App\Models\Common\AppLanguage;
use App\Models\Common\Company;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        // all composers
        View::composers([
//            'App\Http\ViewComposers\CategoryList' => ['layouts.frontend.master'],
//            'App\Http\ViewComposers\BrandsList' => ['layouts.frontend.master'],
//            'App\Http\ViewComposers\ShoppingCart' => ['frontend.english.*', 'auth.*', 'Shared.*'],
            'App\Http\ViewComposers\ShoppingCart' => ['frontend.english.*'],
//            'App\Http\ViewComposers\NewProducts' => ['frontend.*','*.*'],
//            'App\Http\ViewComposers\TopProducts' => ['frontend.*'],
//            'App\Http\ViewComposers\FeaturedTablets' => ['frontend.*'],
            //'App\Http\ViewComposers\FeaturedSmartPhones' => ['frontend.*'],
            //'App\Http\ViewComposers\HomePageSlider' => ['frontend.index'],
        ]);


        View::composer('*', function ($view) {



            $view->with('is_logged_in', Auth::guard('user')->check())->with('name', Auth::guard('user')->user());
            $view->with('is_admin_logged_in', Auth::guard('admin')->check())->with('name', Auth::guard('admin')->user());

//            $view->with('is_logged_in', auth()->check())->with('auth_user', auth()->user());
        });


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
