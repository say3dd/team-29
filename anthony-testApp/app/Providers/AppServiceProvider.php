<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Product;


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

    public function boot()
    {
        View::composer('FrontEnd.master', function ($view) {
            $bestSellerLaptops = Product::whereIn('product_id', [3, 2, 10])->orderBy('product_id')->get();  
            $view->with('bestSellerLaptops', $bestSellerLaptops);
        });
    }
}
