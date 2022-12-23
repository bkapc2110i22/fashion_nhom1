<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderShoppingController;
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

Route::get('/product-detail', function () {
    return view('home.product-detail');
});
Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('blog-details', [HomeController::class, 'blog_details'])->name('home.blog-details');
Route::get('shop-cart', [HomeController::class, 'shop_cart'])->name('home.shop-cart');
Route::get('checkout', [HomeController::class, 'checkout'])->name('home.checkout');
Route::get('', [HomeController::class, 'index'])->name('home.index');
Route::get('main', [HomeController::class, 'main'])->name('home.main');
Route::get('/blog-detail/{blog}-{slug}', [HomeController::class, 'blog_detail'])->name('home.blog_detail');
Route::get('//{product}-{slug}', [HomeController::class, 'productDetail'])->name('home.productDetail');
Route::get('/danh-muc/{category}-{slug}', [HomeController::class, 'category'])->name('home.category'); 
Route::get('shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('register', [HomeController::class, 'register'])->name('home.register');
Route::get('login', [HomeController::class, 'login'])->name('home.login');

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
    Route::group(['prefix' => 'banner'], function() {
        Route::get('/trashed', [BannerController::class, 'trashed'])->name('banner.trashed'); 
        Route::get('/restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');
        Route::get('/forceDelete/{id}', [BannerController::class, 'forceDelete'])->name('banner.forceDelete');
    });
    Route::group(['prefix' => 'blog'], function() {
        Route::get('/trashed', [BlogController::class, 'trashed'])->name('blog.trashed'); 
        Route::get('/restore/{id}', [BlogController::class, 'restore'])->name('blog.restore');
        Route::get('/forceDelete/{id}', [BlogController::class, 'forceDelete'])->name('blog.forceDelete');
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

Route::group(['prefix' => 'cart'], function() {

    Route::get('', [CartController::class, 'view'])->name('cart.view');
    Route::get('add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');

});
Route::group(['prefix' => 'order','middleware' => 'cus'], function() {

    Route::get('checkout', [OrderShoppingController::class, 'checkout'])->name('order.checkout');
    Route::get('history', [OrderShoppingController::class, 'history'])->name('order.history');
    Route::post('checkout', [OrderShoppingController::class, 'post_checkout']);

});
Route::group(['prefix' => 'account'], function() {

    Route::get('/login', [HomeController::class, 'login'])->name('home.login'); 
    Route::get('/logout', [HomeController::class, 'logout'])->name('home.logout'); 
    Route::post('/login', [HomeController::class, 'check_login']);
    
    Route::get('/register', [HomeController::class, 'register'])->name('home.register'); 
    Route::post('/register', [HomeController::class, 'post_register']); 
});