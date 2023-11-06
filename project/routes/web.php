<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Market\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix("admin")->namespace('Admin')->group(function () {
    Route::get('/', function(){
        return view('admin.index');
    })->name('admin.dashboard.show');

    Route::prefix('brand')->group(function(){
        Route::get('/',[BrandController::class , 'index'])->name('admin.brand.index');
        Route::get('/create',[BrandController::class , 'create'])->name('admin.brand.create');
        Route::get('/edit/{brand}',[BrandController::class , 'edit'])->name('admin.brand.edit');
        Route::post('/store',[BrandController::class , 'store'])->name('admin.brand.store');
        Route::patch('/update/{brand}',[BrandController::class , 'update'])->name('admin.brand.update');
        Route::delete('/destroy/{brand}',[BrandController::class , 'destroy'])->name('admin.brand.destroy');
    });
});