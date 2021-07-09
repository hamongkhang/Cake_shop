<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\ProductType;
use Session;
use Cart;

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
        Schema::defaultStringLength(191);
        view()->composer('layout.header',function($views){
            $type_product = ProductType::all();
            
            /*dd($type_product);*/
            $views ->with('type_product',$type_product);
        });
        view()->composer('layout.header',function($views){
            $products= Cart::content();
            
            $views ->with('products',$products);
        });
    }
}
