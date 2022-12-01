<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
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
Route::get('/', function () {
    return view('index');
});
Route::get('/blog-details', function () {
    return view('blog-details');
});
Route::get('/product-details', function () {
    return view('product-details');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/shop-cart', function () {
    return view('shop-cart');
});
Route::get('/shop', function () {
    return view('shop');
});

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
    
    Route::resources([
        'category' =>  CategoryController::class,
        'product' =>  ProductController::class,
        'blog' =>  BlogController::class,
        'user' =>  App\Http\Controllers\UserController::class,
    ]);

});
