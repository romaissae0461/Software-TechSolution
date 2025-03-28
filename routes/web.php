<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TechSolController;
use App\Http\Controllers\SupportLevelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EucProcessController;
use App\Http\Controllers\MasterAutoPilotController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/softwares', [SoftwareController::class, 'index'])->name('software.index');

    Route::get('/addsoftware', [SoftwareController::class, 'create'])
        ->middleware('role:admin')
        ->name('software.create');
    Route::post('/store', [SoftwareController::class, 'store'])
        ->middleware('role:admin')
        ->name('software.store');
    Route::get('/alphabet/{letter?}', [SoftwareController::class, 'alphabetically'])->name('alphabet.search');
    Route::get('/software/edit/{id}', [SoftwareController::class, 'edit'])
        ->middleware('role:admin')
        ->name('software.edit');
    Route::put('/edit/{id}', [SoftwareController::class, 'update']) 
        ->middleware('role:admin')->name('software.update');
    Route::get('/show/{id}', [SoftwareController::class, 'show'])->name('software.show');
    Route::delete('/software/{id}', [SoftwareController::class, 'delete'])->middleware('role:admin')->name('software.delete');
    Route::get('/software/search', [SoftwareController::class, 'search'])->name('software.search');

    //News
    Route::get('/news', [NewsController::class, 'index'])->name('home');
    Route::get('/news/create', [NewsController::class, 'create'])->middleware('role:admin')->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->middleware('role:admin')->name('news.store');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->middleware('role:admin')->name('news.edit');
    Route::put('/news/update/{id}', [NewsController::class, 'update'])->middleware('role:admin')->name('news.update');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
    Route::delete('/news/delete/{id}', [NewsController::class, 'delete'])->middleware('role:admin')->name('news.delete');



    //TechSol
    Route::get('/technology_solutions', [TechSolController::class, 'index'])->name('tech.index');
    Route::get('/tech/create', [TechSolController::class, 'create'])->middleware('role:admin')->name('tech.create');
    Route::post('/tech/store', [TechSolController::class, 'store'])->middleware('role:admin')->name('tech.store');
    Route::get('/tech/edit/{id}', [TechSolController::class, 'edit'])->middleware('role:admin')->name('tech.edit');
    Route::put('/tech/edit/{id}', [TechSolController::class, 'update'])->middleware('role:admin')->name('tech.update');
    Route::get('/tech/{id}', [TechSolController::class, 'show'])->name('tech.show');
    Route::delete('/tech/delete/{id}', [TechSolController::class, 'delete'])->middleware('role:admin')->name('tech.delete');

    //Support Level
    Route::get('/support_levels/create', [SupportLevelController::class, 'create'])->name('suplev.create');
    Route::post('/support_levels/create', [SupportLevelController::class, 'store'])->name('suplev.store');
    Route::get('/support_levels/edit/{id}', [SupportLevelController::class, 'edit'])->name('suplev.edit');
    Route::put('/support_levels/edit/{id}', [SupportLevelController::class, 'update'])->name('suplev.update');
    Route::post('/support_levels/delete/{id}', [SupportLevelController::class, 'delete'])->name('suplev.delete');


    //Category
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');


    
    // Documentation
    Route::get('/document/create',[DocumentController::class, 'create'])->middleware('role:admin')->name('doc.create');
    Route::get('/document/create/techsol', [DocumentController::class, 'createForTechSol'])->middleware('role:admin')->name('doc.create.techsol');
    Route::post('/doc/store',[DocumentController::class, 'store'])->middleware('role:admin')->name('doc.store');
    Route::get('/document/edit/{id}', [DocumentController::class, 'edit'])->middleware('role:admin')->name('doc.edit');
    Route::get('/document/edit/techsol/{id}', [DocumentController::class, 'editForTechSol'])->middleware('role:admin')->name('doc.edit.techsol');
    Route::put('/doc/edit/{id}', [DocumentController::class, 'update'])->middleware('role:admin')->name('doc.update');
    Route::get('/document/{id}/{titre}', [DocumentController::class, 'viewFile'])->name('doc.view');
    Route::delete('/doc/delete/{id}', [DocumentController::class, 'delete'])->middleware('role:admin')->name('doc.delete');

    //euc
    Route::get('/euc',[EucProcessController::class, 'index'])->name('euc.index');
    Route::get('/euc/create',[EucProcessController::class, 'create'])->middleware('role:admin')->name('euc.create');
    Route::post('/euc/store',[EucProcessController::class, 'store'])->middleware('role:admin')->name('euc.store');
    Route::get('/euc/{id}/file/{name}', [EucProcessController::class, 'viewFile'])->name('euc.view');
    Route::get('/euc/edit/{id}', [EucProcessController::class, 'edit'])->middleware('role:admin')->name('euc.edit');
    Route::put('/euc/edit/{id}', [EucProcessController::class, 'update'])->middleware('role:admin')->name('euc.update');
    Route::get('/euc/show/{id}', [EucProcessController::class, 'show'])->name('euc.show');
    Route::delete('/euc/delete/{id}', [EucProcessController::class, 'delete'])->middleware('role:admin')->name('euc.delete');

    //Master
    Route::get('/autopilot',[MasterAutoPilotController::class, 'index'])->name('autopilot.index');
    Route::get('/autopilot/create',[MasterAutoPilotController::class, 'create'])->middleware('role:admin')->name('autopilot.create');
    Route::post('/autopilot/store',[MasterAutoPilotController::class, 'store'])->middleware('role:admin')->name('autopilot.store');
    Route::get('/autopilot/{id}/file/{name}', [MasterAutoPilotController::class, 'viewFile'])->name('autopilot.view');
    Route::get('/autopilot/edit/{id}', [MasterAutoPilotController::class, 'edit'])->middleware('role:admin')->name('autopilot.edit');
    Route::put('/autopilot/edit/{id}', [MasterAutoPilotController::class, 'update'])->middleware('role:admin')->name('autopilot.update');
    Route::get('/autopilot/show/{id}', [MasterAutoPilotController::class, 'show'])->name('autopilot.show');
    Route::delete('/autopilot/delete/{id}', [MasterAutoPilotController::class, 'delete'])->middleware('role:admin')->name('autopilot.delete');
});
Route::get('/test-error', function () {
    abort(500);
});


//auth 
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
