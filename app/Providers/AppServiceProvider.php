<?php

namespace App\Providers;


// It's dosn't work (nur);
// use Illuminate\Contracts\Pagination\Paginator;

// Work It (nur);
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    
    // Fix an error of the pagination(nur);
     public function register()
    {   
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
