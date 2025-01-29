<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TechSolController;
use App\Http\Controllers\SupportLevelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EucProcessController;
use App\Http\Controllers\MasterAutoPilotController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/index', [SoftwareController::class, 'index'])->name('software.index');

Route::get('/addsoftware', [SoftwareController::class, 'create'])->name('software.create');
Route::post('/store', [SoftwareController::class, 'store'])->name('software.store');
Route::get('/alphabet/{letter?}', [SoftwareController::class, 'alphabetically'])->name('alphabet.search');
Route::get('/edit/{id}', [SoftwareController::class, 'edit'])->name('software.edit');
Route::put('/edit/{id}', [SoftwareController::class, 'update'])->name('software.update');
Route::get('/show/{id}', [SoftwareController::class, 'show'])->name('software.show');
Route::delete('/software/{id}', [SoftwareController::class, 'delete'])->name('software.delete');
Route::get('/software/search', [SoftwareController::class, 'search'])->name('software.search');

//News
Route::get('/news', [NewsController::class, 'index'])->name('home');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::delete('/news/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');



//TechSol
Route::get('/tech/index', [TechSolController::class, 'index'])->name('tech.index');
Route::get('/tech/create', [TechSolController::class, 'create'])->name('tech.create');
Route::post('/tech/store', [TechSolController::class, 'store'])->name('tech.store');
Route::get('/tech/edit/{id}', [TechSolController::class, 'edit'])->name('tech.edit');
Route::put('/tech/edit/{id}', [TechSolController::class, 'update'])->name('tech.update');
Route::get('/tech/{id}', [TechSolController::class, 'show'])->name('tech.show');
Route::delete('/tech/delete/{id}', [TechSolController::class, 'delete'])->name('tech.delete');

//Support Level
Route::get('/support_levels/create', [SupportLevelController::class, 'create'])->name('suplev.create');
Route::post('/support_levels/create', [SupportLevelController::class, 'store'])->name('suplev.store');
Route::get('/support_levels/edit/{id}', [SupportLevelController::class, 'edit'])->name('suplev.edit');
Route::put('/support_levels/edit/{id}', [SupportLevelController::class, 'update'])->name('suplev.update');
Route::post('/support_levels/delete/{id}', [SupportLevelController::class, 'delete'])->name('suplev.delete');


//Category
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');


//Service
Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service/create', [ServiceController::class, 'store'])->name('service.store');


// Documentation
Route::get('/doc/create',[DocumentController::class, 'create'])->name('doc.create');
Route::get('/doc/create/techsol', [DocumentController::class, 'createForTechSol'])->name('doc.create.techsol');
Route::post('/doc/store',[DocumentController::class, 'store'])->name('doc.store');
Route::get('/doc/edit/{id}', [DocumentController::class, 'edit'])->name('doc.edit');
Route::put('/doc/edit/{id}', [DocumentController::class, 'update'])->name('doc.update');
Route::delete('/doc/delete/{id}', [DocumentController::class, 'delete'])->name('doc.delete');

//euc
Route::get('/euc/index',[EucProcessController::class, 'index'])->name('euc.index');
Route::get('/euc/create',[EucProcessController::class, 'create'])->name('euc.create');
Route::post('/euc/store',[EucProcessController::class, 'store'])->name('euc.store');
Route::get('/euc/edit/{id}', [EucProcessController::class, 'edit'])->name('euc.edit');
Route::put('/euc/edit/{id}', [EucProcessController::class, 'update'])->name('euc.update');
Route::get('/euc/show/{id}', [EucProcessController::class, 'show'])->name('euc.show');
Route::delete('/euc/delete/{id}', [EucProcessController::class, 'delete'])->name('euc.delete');

//Master
Route::get('/autopilot/index',[MasterAutoPilotController::class, 'index'])->name('autopilot.index');
Route::get('/autopilot/create',[MasterAutoPilotController::class, 'create'])->name('autopilot.create');
Route::post('/autopilot/store',[MasterAutoPilotController::class, 'store'])->name('autopilot.store');
Route::get('/autopilot/edit/{id}', [MasterAutoPilotController::class, 'edit'])->name('autopilot.edit');
Route::put('/autopilot/edit/{id}', [MasterAutoPilotController::class, 'update'])->name('autopilot.update');
Route::get('/autopilot/show/{id}', [MasterAutoPilotController::class, 'show'])->name('autopilot.show');
Route::delete('/autopilot/delete/{id}', [MasterAutoPilotController::class, 'delete'])->name('autopilot.delete');

//auth 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
