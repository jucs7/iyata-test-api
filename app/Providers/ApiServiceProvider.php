<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\AuthService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\SupplierService;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService($app->make(UserRepositoryInterface::class));
        });

        $this->app->singleton(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryRepositoryInterface::class));
        });

        $this->app->singleton(SupplierService::class, function ($app) {
            return new SupplierService($app->make(SupplierRepositoryInterface::class));
        });

        $this->app->singleton(ProductService::class, function ($app) {
            return new ProductService($app->make(ProductRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
