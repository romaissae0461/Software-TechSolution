<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TechSolController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/show', [SoftwareController::class, 'show']);

Route::get('/index', [SoftwareController::class, 'index'])->name('software.index');

Route::get('/addsoftware', [SoftwareController::class, 'create']);
Route::post('/store', [SoftwareController::class, 'store'])->name('software.store');
Route::get('/software/{letter?}', [SoftwareController::class, 'alphabetically'])->name('software.alphabetically');
Route::get('/edit/{id}', [SoftwareController::class, 'edit'])->name('software.edit');
Route::put('/edit/{id}', [SoftwareController::class, 'update'])->name('software.update');
Route::delete('/software/{id}', [SoftwareController::class, 'delete'])->name('software.delete');


//News
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/edit/{id}', [NewsController::class, 'update'])->name('news.update');
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