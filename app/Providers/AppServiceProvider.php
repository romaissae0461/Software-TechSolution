<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Software;
use App\Models\TechSol;
use App\Models\EucProcess;
use App\Models\MasterAutoPilot;


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
            $keyword = request('keyword');

            $softwareCount = Software::count();
            $techSolCount = TechSol::count(); 
            $eucCount = EucProcess::count(); 
            $autopilotCount = MasterAutoPilot::count(); 
            $softkeyCount = Software::where('mot_clef', 'LIKE', '%' . $keyword . '%')->count();
            $techkeyCount = TechSol::where('mot_clef', 'LIKE', '%' . $keyword . '%')->count(); 
            $view->with(['softwareCount' => $softwareCount,'techSolCount' => $techSolCount, 'softkeyCount' => $softkeyCount,'techkeyCount' => $techkeyCount, 'eucCount' => $eucCount, 'autopilotCount' => $autopilotCount]);
        });
    }
}
