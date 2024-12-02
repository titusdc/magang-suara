<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserLoginController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;
Route::get('/',[HomeController::class,'home']);
Route::get('/detail-category/{id}',[HomeController::class,'category']);
Route::get('/detail-product/{id}',[HomeController::class,'product']);

Route::get('/listcart',[CartController::class,'listcart'])->name('listcart');
Route::get('/cart/{id}',[CartController::class,'cart']);
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/checkout',[CheckoutController::class,'checkout']);

Route::post('/contact',[ContactController::class,'store']);
Route::get('/contact/index',[ContactController::class,'index']);

Route::post('/order',[OrderController::class,'store']);
Route::get('/order/index',[OrderController::class,'index']);



Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/setting', function () {
    return view('setting');
});
Route::get('/profile', function () {
    return view('profile');
});

//route resource for products
Route::resource('/products', \App\Http\Controllers\ProductController::class)->middleware('isLogin');
Route::resource('/categorys', \App\Http\Controllers\CategoryController::class)->middleware('isLogin');
Route::resource('/types', \App\Http\Controllers\TypeController::class)->middleware('isLogin');
Route::post('/profile',[ProfileController::class,'profile'])->middleware('isLogin')->name('profile.update');
Route::post('/setting',[ProfileController::class,'setting'])->middleware('isLogin')->name('profile.setting');

Route::resource('/contact',\App\Http\Controllers\Frontend\ContactController::class);
Route::resource('/order', \App\Http\Controllers\Frontend\OrderController::class);

// Route::get('products',[ProductController::class,'index']);
// Route::get('products/{id}',[ProductController::class,'detail'])->where('id','[0-9]+');

// Route::get('/',[HalamanController::class,'index']);
// Route::get('/kontak',[HalamanController::class,'kontak']);
// Route::get('/tentang',[HalamanController::class,'tentang']);


Route::get('/sesi',[SessionController::class,'index'])->middleware('isTamu');
Route::post('/sesi/login',[SessionController::class,'login'])->middleware('isTamu');
Route::get('/sesi/logout',[SessionController::class,'logout']);
Route::get('/sesi/register',[SessionController::class,'register'])->middleware('isTamu');
Route::post('/sesi/create',[SessionController::class,'create'])->middleware('isTamu');

Route::get('/user',[UserLoginController::class,'index']);
Route::post('/user/login',[UserLoginController::class,'login']);
Route::get('/user/logout',[UserLoginController::class,'logout']);
Route::get('/user/register',[UserLoginController::class,'register']);
Route::post('/user/create',[UserLoginController::class,'create']);