<?php

namespace App\Providers;

use App\Models\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('website.includes.banner', function ($view) {
            $routes = Route::whereNotNull('location_to')->get();
            $view->with('routes', $routes);
        });
    }
}
