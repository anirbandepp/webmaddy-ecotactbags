<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
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
        view()->composer('admin.orders.orders', function ($view) {
            $bulkArr = ['Cancelled' => 'Change status to Cancelled'];
            $arr = [route('orders.index', ['OrderStatus' => 'all']) => 'All Orders', route('orders.index', ['OrderStatus' => 'pending']) => 'Pending Orders', route('orders.index', ['OrderStatus' => 'confirmed']) => 'Confirmed Orders', route('orders.index', ['OrderStatus' => 'returned']) => 'Returned Orders', route('orders.index', ['OrderStatus' => 'shipped']) => 'Shipped Orders', route('orders.index', ['OrderStatus' => 'cancelled']) => 'Cancelled Orders', route('orders.index', ['OrderStatus' => 'refunded']) => 'Refunded Orders', route('orders.index', ['OrderStatus' => 'delivered']) => 'Delivered Orders'];
            if (config('app.orderStatus') == 'pending') {
                $bulkArr = ['Confirmed' => 'Change status to Confirmed'];
            }
            $view->with('statusArray', $arr)->with('bulkArr', $bulkArr);
        });
        view()->composer('*', function ($view) {
            $cartCount = Session::get('cart') ? count(Session::get('cart')) : 0;
            $frontCategories = \App\Category::where('active', 1)->get();
            $frontLanguages = \App\Language::where('is_visible', 1)->get();
            //dd($frontLanguages);
            $deliveryLinks = \App\DeliveryService::where('active', 1)->get();
            $creative = \App\Creative::where('active', 1)->first();
            $view->with('cartCount', $cartCount)->with('frontCategories', $frontCategories)->with('frontLanguages', $frontLanguages)->with('deliveryLinks', $deliveryLinks)->with('creative', $creative);
        });
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
