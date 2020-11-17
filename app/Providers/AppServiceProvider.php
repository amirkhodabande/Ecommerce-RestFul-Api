<?php

namespace App\Providers;

use App\Repositories\Api\Product\ProductRepository as ApiProductRepository;
use App\Repositories\Api\Product\ProductRepositoryInterface as ApiProductRepositoryInterface;

use App\Repositories\Api\Review\ReviewRepository as ApiReviewRepository;
use App\Repositories\Api\Review\ReviewRepositoryInterface as ApiReviewRepositoryInterface;

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
        $this->app->bind(ApiProductRepositoryInterface::class, ApiProductRepository::class);
        $this->app->bind(ApiReviewRepositoryInterface::class, ApiReviewRepository::class);
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
