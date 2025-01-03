<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Software;
use App\Models\TechSol;


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
        view()->composer('*', function ($view) {
            $softwareCount = Software::count();
            $techSolCount = TechSol::count(); 
            $view->with(['softwareCount' => $softwareCount,'techSolCount' => $techSolCount]);
        });
    }
}
