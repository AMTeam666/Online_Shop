<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Content\PostCategoryController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;

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

    Route::prefix('market')->namespace('Market')->group(function(){
        //brand
        Route::prefix('brand')->group(function(){
            Route::get('/',[BrandController::class , 'index'])->name('admin.market.brand.index');
            Route::get('/create',[BrandController::class , 'create'])->name('admin.market.brand.create');
            Route::get('/edit/{brand}',[BrandController::class , 'edit'])->name('admin.market.brand.edit');
            Route::post('/store',[BrandController::class , 'store'])->name('admin.market.brand.store');
            Route::patch('/update/{brand}',[BrandController::class , 'update'])->name('admin.market.brand.update');
            Route::delete('/destroy/{brand}',[BrandController::class , 'destroy'])->name('admin.market.brand.destroy');
        });

        //category
        Route::prefix('category')->group(function(){
            Route::get('/',[CategoryController::class , 'index'])->name('admin.market.category.index');
            Route::get('/create',[CategoryController::class , 'create'])->name('admin.market.category.create');
            Route::get('/edit/{category}',[CategoryController::class , 'edit'])->name('admin.market.category.edit');
            Route::post('/store',[CategoryController::class , 'store'])->name('admin.market.category.store');
            Route::patch('/update/{category}',[CategoryController::class , 'update'])->name('admin.market.category.update');
            Route::delete('/destroy/{category}',[CategoryController::class , 'destroy'])->name('admin.market.category.destroy');
        });

        //product
        Route::prefix('product')->group(function(){
            Route::get('/',[ProductController::class , 'index'])->name('admin.market.product.index');
            Route::get('/create',[ProductController::class , 'create'])->name('admin.market.product.create');
            Route::get('/edit/{product}',[ProductController::class , 'edit'])->name('admin.market.product.edit');
            Route::post('/store',[ProductController::class , 'store'])->name('admin.market.product.store');
            Route::patch('/update/{product}',[ProductController::class , 'update'])->name('admin.market.product.update');
            Route::delete('/destroy/{product}',[ProductController::class , 'destroy'])->name('admin.market.product.destroy');
            Route::get('/status/{product}', [ProductController::class, 'status'])->name('admin.market.product.status');
        });

         //delivery
        Route::prefix('delivery')->group(function () {
            Route::get('/', [DeliveryController::class, 'index'])->name('admin.market.delivery.index');
            Route::get('/create', [DeliveryController::class, 'create'])->name('admin.market.delivery.create');
            Route::post('/store', [DeliveryController::class, 'store'])->name('admin.market.delivery.store');
            Route::get('/edit/{delivery}', [DeliveryController::class, 'edit'])->name('admin.market.delivery.edit');
            Route::put('/update/{delivery}', [DeliveryController::class, 'update'])->name('admin.market.delivery.update');
            Route::delete('/destroy/{delivery}', [DeliveryController::class, 'destroy'])->name('admin.market.delivery.destroy');
            Route::get('/status/{delivery}', [DeliveryController::class, 'status'])->name('admin.market.delivery.status');
        });

        //comments
        Route::prefix('comment')->group(function (){
            Route::get('/', [CommentController::class, 'index'] )->name('admin.market.comment.index');
            Route::get('/show/{comment}', [CommentController::class, 'show'] )->name('admin.market.comment.show');
            Route::post('/store', [CommentController::class, 'store'] )->name('admin.market.comment.store');
//            Route::get('/edit/{id}', [CommentController::class, 'edit'] )->name('admin.market.comment.edit');
//            Route::patch('/update/{id}', [CommentController::class, 'update'] )->name('admin.market.comment.update');
            Route::delete('/destroy/{id}', [CommentController::class, 'destroy'] )->name('admin.market.comment.destroy');
            Route::get('/status/{comment}', [CommentController::class, 'status'] )->name('admin.market.comment.status');
            Route::get('/approved/{comment}', [CommentController::class, 'approved'] )->name('admin.market.comment.approved');
            Route::post('/answer/{comment}', [CommentController::class, 'answer'] )->name('admin.market.comment.answer');
        });
    });

     Route::prefix('content')->namespace('Content')->group(function(){

        //post categories
        Route::prefix('category')->group(function(){
             Route::get('/',[PostCategoryController::class , 'index'])->name('admin.content.category.index');
             Route::get('/create',[PostCategoryController::class , 'create'])->name('admin.content.category.create');            Route::get('/edit/{category}',[PostCategoryController::class , 'edit'])->name('admin.content.category.edit');
             Route::post('/store',[PostCategoryController::class , 'store'])->name('admin.content.category.store');
            Route::patch('/update/{category}',[PostCategoryController::class , 'update'])->name('admin.content.category.update');
            Route::delete('/destroy/{category}',[PostCategoryController::class , 'destroy'])->name('admin.content.category.destroy');
        });

        //posts
        Route::prefix('post')->group(function(){
            Route::get('/',[PostController::class , 'index'])->name('admin.content.posts.index');
            Route::get('/create',[PostController::class , 'create'])->name('admin.content.posts.create');
            Route::get('/edit/{post}',[PostController::class , 'edit'])->name('admin.content.posts.edit');
            Route::post('/store',[PostController::class , 'store'])->name('admin.content.posts.store');
            Route::patch('/update/{post}',[PostController::class , 'update'])->name('admin.content.posts.update');
            Route::delete('/destroy/{post}',[PostController::class , 'destroy'])->name('admin.content.posts.destroy');
        });

        //comments
        Route::prefix('comment')->group(function (){
            Route::get('/', [ContentCommentController::class, 'index'] )->name('admin.content.comment.index');
            Route::get('/show/{comment}', [ContentCommentController::class, 'show'] )->name('admin.content.comment.show');
            Route::post('/store', [ContentCommentController::class, 'store'] )->name('admin.content.comment.store');
//            Route::get('/edit/{id}', [ContentCommentController::class, 'edit'] )->name('admin.content.comment.edit');
//            Route::patch('/update/{id}', [ContentCommentController::class, 'update'] )->name('admin.content.comment.update');
            Route::delete('/destroy/{comment}', [ContentCommentController::class, 'destroy'] )->name('admin.content.comment.destroy');
            Route::get('/status/{comment}', [ContentCommentController::class, 'status'] )->name('admin.content.comment.status');
            Route::get('/approved/{comment}', [ContentCommentController::class, 'approved'] )->name('admin.content.comment.approved');
            Route::post('/answer/{comment}', [ContentCommentController::class, 'answer'] )->name('admin.content.comment.answer');
        });
    });
});