<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cart;
use Session;

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
       /* //Truyền thông tin và in ra giỏ hàng
        view()->composer(['users.layouts.header'],function($view){
            if(Session('cart')){
                //lấy session giỏ hàng hiện tại
                $oldCart = Session::get('cart');
                // kiểm tra giỏ hàng cũ đã có hay chưa nếu chưa gắn vòa giỏ hàng mới
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            } else {
                echo "string";
            }
        });
        */

        // view()->composer(['header','page.dat_hang'],function($view){
            
    }
}
