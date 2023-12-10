<?php

/*

@say3dd (Mohammed Miah) - Used AppServiceProvider, couldn't figure out how to display both "Best Sellers" and "Our Products"
on homepage without using this.
This code is only for the "Best Seller" section. Can easily change the laptops by changing the product_id numbers in the array.

*/
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
        View::composer('*', function ($view) {
            $bestSellerLaptops = Product::whereIn('product_id', [3, 2, 10])->orderBy('product_id')->get();
            $view->with('bestSellerLaptops', $bestSellerLaptops);
        });
    }
}
