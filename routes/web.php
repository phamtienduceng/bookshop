<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/prod/{slug}', [Homecontroller::class, 'singleProducts'])->name('singleProducts');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');



Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');

Route::get('/articles', [HomeController::class, 'articles'])->name('articles');

Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('/home', [DashboardController::class, 'home'])->name('admin');

Route::get('/login', [DashboardController::class, 'login'])->name('login');

<<<<<<< Updated upstream
Route::get('/register', [DashboardController::class, 'register'])->name('register');

Route::resource('/product', ProductController::class);
    
Route::get('/admin-product', [ProductController::class, 'index'])->name('adminProduct');

Route::get('/admin-order', [OrderController::class, 'index'])->name('adminOrder');

Route::get('/admin-account', [AccountController::class, 'index'])->name('adminAccount');
=======
Route::get('login',[DashboardController::class,'showFormLogin'])->name('show-form-login');
Route::post('login',[DashboardController::class,'login'])->name('login');

Route::group(['middleware'=>'checklogin'],function(){
    Route::get('profile',[DashboardController::class,'showProfile'])->name('show-profile');
    Route::post('profile',[DashboardController::class,'profile'])->name('profile');

    Route::group(['middleware'=>'checkadmin'],function(){
        Route::get('/home', [DashboardController::class, 'home'])->name('admin');

        Route::get('/admin-product', [ProductController::class, 'index'])->name('adminProduct');

        Route::get('/admin-order', [OrderController::class, 'index'])->name('adminOrder');

        Route::get('/admin-account', [AccountController::class, 'index'])->name('adminAccount');

        Route::resource('/product', ProductController::class);
     });
});

Route::get('logout',[DashboardController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist/{product}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{product}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'processPayment'])->name('checkout.processPayment');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
>>>>>>> Stashed changes
