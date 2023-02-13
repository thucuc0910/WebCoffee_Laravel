<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CartController;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Expr\PostDec;

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register/account', [RegisterController::class, 'account']);

Route::get('/logout', [LoginController::class, 'logout']);



Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name(name: 'admin');
        Route::get('main', [MainController::class, 'index']);
        Route::get('/logout', [MainController::class, 'logout']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::delete('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::delete('destroy', [ProductController::class, 'destroy']);
        });


        #Upload
        route::post('upload/services', [UploadController::class, 'store']);

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::delete('destroy', [SliderController::class, 'destroy']);
        });

        // Order
            Route::get('order',[CartController::class, 'index']);
            Route::get('order1',[CartController::class, 'index1']);
            Route::get('order2',[CartController::class, 'index2']);
            Route::get('order3',[CartController::class, 'index3']);
            Route::get('order0',[CartController::class, 'index0']);
            Route::get('order/{id}', [CartController::class, 'detail']);
            Route::post('order/{id}', [CartController::class, 'updateOrder']);
            // Route::resource('order', 'CartController');

        // User
        Route::prefix('users')->group(function () {
            Route::get('add', [MainController::class, 'create']);
            Route::post('add', [MainController::class, 'store']);
            Route::get('list', [MainController::class, 'list']);
            // Route::get('edit/{user}', [MainController::class, 'show']);
            // Route::post('edit/{user}', [MainController::class, 'update']);
            Route::delete('destroy', [MainController::class, 'destroy']);
         });

    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name(name: 'user'); 
Route::get('main', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
Route::post('search', [App\Http\Controllers\MainController::class, 'search']);

Route::get('/discount', [App\Http\Controllers\MenuController::class, 'discountProduct']);
// Route::get('/contact', [App\Http\Controllers\MenuController::class, 'contact']);
Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('checkout-cart', [App\Http\Controllers\CartController::class, 'indexCheckout']);
Route::get('checkout-cart', [App\Http\Controllers\CartController::class, 'indexCheckout']);
Route::post('/carts/checkout', [App\Http\Controllers\CartController::class, 'postCart']);
Route::get('/history/{id}',[App\Http\Controllers\CartController::class, 'showOrder']);
Route::get('/history/orderdetail/{id}',[App\Http\Controllers\CartController::class, 'showOrderDetail']);
Route::post('/history/orderdetail/{id}',[App\Http\Controllers\CartController::class, 'updateOrderDetail']);

// Route::get('/social-auth', [App\Http\Controllers\Auth\SocialAuthController::class, 'index'])->name('social-auth');
Route::get('/auth/google/redirect',[App\Http\Controllers\Auth\SocialAuthController::class, 'googleRedirect'])->name('googleRedirect');
Route::get('/auth/google/callback',[App\Http\Controllers\Auth\SocialAuthController::class, 'googleCallback'])->name('googleCallback');