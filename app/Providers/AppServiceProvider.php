<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\EloquentCategoryRepository;
use App\Repositories\UserDetails\UserDetailsRepository;
use App\Repositories\UserDetails\UserDetailsRepositoryInterface;
use App\Repositories\ProductServices\ProductServicesRepositoryInterface;
use App\Repositories\ProductServices\ProductServicesRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            EloquentCategoryRepository::class,
        );
        $this->app->bind(
            UserDetailsRepositoryInterface::class,
            UserDetailsRepository::class
        );
        $this->app->bind(
            ProductServicesRepositoryInterface::class,
            ProductServicesRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
