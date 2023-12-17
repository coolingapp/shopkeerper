<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserControlller;




Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->group(function () {

    Route::get('/register', [AdminController::class, 'register']);
    Route::post('/register', [AdminController::class, 'registeradmin']);
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/login', [AdminController::class, 'adminlogin']);

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::get('/category', [AdminController::class, 'category']);
        Route::get('/create_category', [AdminController::class, 'create_category']);
        Route::post('/create_category', [AdminController::class, 'create_category_name']);
        Route::get('/product', [AdminController::class, 'product']);
        Route::get('/create_product', [AdminController::class, 'create_product']);
        Route::post('/create_product', [AdminController::class, 'product_include']);
        Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
        Route::post('/edit_product/{id}', [AdminController::class, 'update_product']);
        Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
        Route::get('/order', [AdminController::class, 'order']);
        Route::get('/user', [AdminController::class, 'user']);
        Route::get('/adminprofile', [AdminController::class, 'adminprofile']);
        Route::post('/adminprofile', [AdminController::class, 'adminprofileupdate']);
        Route::get('/create_category', [AdminController::class, 'create_category']);
        Route::get('/logout', [AdminController::class, 'logout']);
    });

});


Route::get('/register', [UserControlller::class, 'register']);
Route::post('/register', [UserControlller::class, 'registeruser']);
Route::get('/login', [UserControlller::class, 'login']);
Route::post('/login', [UserControlller::class, 'loginuser']);
Route::get('/cart/{id}', [HomeController::class, 'insertcart']);


Route::middleware(['auth:web','PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [UserControlller::class, 'dashboard']);
        Route::get('/profile', [UserControlller::class, 'profile']);
        Route::post('/profile', [UserControlller::class, 'profileupdate']);
        Route::get('/cart', [HomeController::class, 'cart']);
        Route::get('/cart/cancel/{id}', [HomeController::class, 'productcancel']);
        Route::get('/cart/order/{id}', [HomeController::class, 'productorder']);
        Route::get('/order', [HomeController::class, 'order']);
        Route::get('/logout', [UserControlller::class, 'logout']);
    });





