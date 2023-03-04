<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

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
        //
         app()->setLocale('ar');
        //dd(app()->getLocale());
         session()->put('lang','ar');

          
        Schema::defaultStringLength(191);
    }
}
