<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DefaultController;
use Illuminate\Support\Facades\Route;


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
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/login-form',[AuthController::class,'showLoginForm'])->name('loginForm');
    Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/',[DefaultController::class,'index'])->name('index');
Route::get('/products',[DefaultController::class,'products'])->name('products');
Route::get('/product/{id}',[DefaultController::class,'product'])->name('product');

Route::get('/blogs',[DefaultController::class,'blogs'])->name('blogs');
Route::get('/blog/{id}',[DefaultController::class,'blog'])->name('blog');
Route::get('/contact',[DefaultController::class,'contact'])->name('contact');

Route::post('/create-order',[DefaultController::class,'orderCreate'])->name('orderCreate');

});
