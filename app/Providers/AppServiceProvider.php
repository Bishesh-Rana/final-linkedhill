<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        view()->composer(['website.layouts.app'], 'App\Http\View\Composers\MenuComposer');
        view()->composer(['website.index'], 'App\Http\View\Composers\MenuComposer');
        view()->composer(['website.customer.auth.signup'], 'App\Http\View\Composers\MenuComposer');
    }

    //check that app is local


}
