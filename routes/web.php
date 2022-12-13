<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('blog-details', [HomeController::class, 'blog_details'])->name('home.blog-details');
Route::get('checkout', [HomeController::class, 'checkout'])->name('home.checkout');
Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('', [HomeController::class, 'index'])->name('home.index');
Route::get('main', [HomeController::class, 'main'])->name('home.main');
Route::get('product-details', [HomeController::class, 'product_details'])->name('home.product-details');
Route::get('shop-cart', [HomeController::class, 'shop_cart'])->name('home.shop-cart');
Route::get('shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('register', [HomeController::class, 'register'])->name('home.register');
Route::get('login', [HomeController::class, 'login'])->name('home.login');

// Route::get('product',[ProductController::class,'index'])->name('product.index');
// Route::get('product/create',[ProductController::class,'create'])->name('product.create');
// Route::post('product',[ProductController::class,'store'])->name('product.store');
// Route::delete('product/{id}',[ProductController::class,'delete'])->name('product.delete');
// Route::get('product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
// Route::put('product/{id}',[ProductController::class,'update'])->name('product.update');

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'category'], function() {
        Route::get('/trashed', [CategoryController::class, 'trashed'])->name('category.trashed'); 
        Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get('/forceDelete/{id}', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    });
    Route::group(['prefix' => 'product'], function() {
        Route::get('/forceDelete/{id}', [ProductController::class, 'forceDelete'])->name('product.forceDelete');
    });
    
    Route::resources([
        'category' =>  CategoryController::class,
        'product' =>  ProductController::class,
        'blog' =>  BlogController::class,
        'banner' =>  BannerController::class,
        'user' =>  App\Http\Controllers\UserController::class,
    ]);

});
