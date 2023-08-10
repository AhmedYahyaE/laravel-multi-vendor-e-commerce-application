<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Customizing The Pagination View Using Bootstrap (displaying Laravel pagination using Bootstrap pagination): https://laravel.com/docs/9.x/pagination#using-bootstrap
        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}