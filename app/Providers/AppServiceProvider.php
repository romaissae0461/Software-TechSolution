<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Software;
use App\Models\TechSol;
use App\Models\EucProcess;
use App\Models\MasterAutoPilot;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
        DB::listen(function ($query) {
            if ($query->time > 1000) { // Queries that take more than 1000ms (1s)
                Log::warning("Slow Query: {$query->sql} - Time: {$query->time}ms", $query->bindings);
            }
        });
        // The ancient code might slow down the loading of the page, 
        // cause it's calling several queries at the same time, the new code is one optimized query with subqueries
        
        // view()->composer('*', function ($view) {
        //     $keyword = request('keyword');

        //     $softwareCount = Software::count();
        //     $techSolCount = TechSol::count(); 
        //     $eucCount = EucProcess::count(); 
        //     $autopilotCount = MasterAutoPilot::count(); 
        //     $softkeyCount = Software::where('mot_clef', 'LIKE', '%' . $keyword . '%')->count();
        //     $techkeyCount = TechSol::where('mot_clef', 'LIKE', '%' . $keyword . '%')->count(); 
        //     $view->with(['softwareCount' => $softwareCount,'techSolCount' => $techSolCount, 'softkeyCount' => $softkeyCount,'techkeyCount' => $techkeyCount, 'eucCount' => $eucCount, 'autopilotCount' => $autopilotCount]);
        // });
        view()->composer('*', function ($view) {
            $keyword = request('keyword', ''); // Default empty to avoid errors
    
            $cacheKey = 'counts_' . md5($keyword); //Using md5($keyword) to create a unique cache entry for each keyword.

            //Data is stored for 10 minutes (now()->addMinutes(10)), to adjust if needed:
            $counts = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($keyword) {
                return DB::select("
                    SELECT 
                        (SELECT COUNT(*) FROM software) AS software_count,
                        (SELECT COUNT(*) FROM techsols) AS techsol_count,
                        (SELECT COUNT(*) FROM euc_process) AS euc_count,
                        (SELECT COUNT(*) FROM master_autopilot) AS autopilot_count,
                        (SELECT COUNT(*) FROM software WHERE mot_clef LIKE ?) AS softkey_count,
                        (SELECT COUNT(*) FROM techsols WHERE mot_clef LIKE ?) AS techkey_count
                ", ["%$keyword%", "%$keyword%"])[0]; 
            });
        
            $view->with([
                'softwareCount' => $counts->software_count,
                'techSolCount' => $counts->techsol_count,
                'softkeyCount' => $counts->softkey_count,
                'techkeyCount' => $counts->techkey_count,
                'eucCount' => $counts->euc_count,
                'autopilotCount' => $counts->autopilot_count
            ]);
        });
    }
}
