<?php

namespace App\Providers;

use App\Models\Common\AppLanguage;
use App\Models\Common\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('backend.*', function ($view) {

            $com_locale = Company::where('id',1)
                ->value('locale');

            $locale = AppLanguage::where('locale',$com_locale)->first();
            $view->with('locale', $locale->name);
        });

        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
