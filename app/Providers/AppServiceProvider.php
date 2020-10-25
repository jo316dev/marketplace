<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Observers\CategoryObeserver;
use App\Observers\ProductObeserver;
use App\Observers\StoreObeserver;
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
        Store::observe(StoreObeserver::class);
        Product::observe(ProductObeserver::class);
        Category::observe(CategoryObeserver::class);
    }
}
