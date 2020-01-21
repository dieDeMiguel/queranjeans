<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Cart;

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
       
        View::composer('*', function ($view) {
            if(\Auth::check()){
                $carrito = Cart::where("user_id",\Auth::user()->id)->where('status','=','1')->get();
            if(isset($carrito[0])){
                $carritoActivo = $carrito[0];
            } else {
                $carritoActivo = new Cart;
            }

            view()->share('carritoActivo', $carritoActivo);
            }
            
        });
    }
}
