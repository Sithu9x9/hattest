<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Service;
use App\Observers\ClientObserver;
use App\Observers\ProductObserver;
use App\Observers\ServiceObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        $this->registerFrontendComponents();
        $this->registerBackendComponents();

        Service::observe(ServiceObserver::class);
        Client::observe(ClientObserver::class);
        Product::observe(ProductObserver::class);
    }

    public function registerFrontendComponents()
    {
        $path = resource_path('views/frontend/components/');
        $files = glob($path . '/*.blade.php');

        foreach ($files as $file) {
            $componentName = basename($file, '.blade.php');
            $componentViewPath = "frontend.components.$componentName";
            Blade::component($componentViewPath, $componentName);
        }
    }

    public function registerBackendComponents()
    {
        $path = resource_path('views/backend/components/');
        $files = glob($path . '/*.blade.php');

        foreach ($files as $file) {
            $componentName = basename($file, '.blade.php');
            $componentViewPath = "backend.components.$componentName";
            Blade::component($componentViewPath, $componentName);
        }
    }
}
