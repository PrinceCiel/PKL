<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;

// Route Member / Guest

Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/product/{slug}', [FrontendController::class, 'show']);
Route::get('/cart', [FrontendController::class, 'cart']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route Admin / Backend
Route::group(['prefix'=>'admin','middleware'=>['auth', Admin::class]], function(){
    Route::get('/', [BackendController::class, 'index']);
    // crud
    Route::resource('/category',  CategoryController::class);
    Route::resource('/product',  ProductController::class);
});
