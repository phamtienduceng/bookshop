<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Userontroller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;



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

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Single product page
Route::get('/prod/{slug}', [HomeController::class, 'singleProducts'])->name('singleProducts');

// About us page
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');

// Contact us page
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');

// Cart page
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');

// Articles page
Route::get('/articles', [HomeController::class, 'articles'])->name('articles');

// Products page
Route::get('/products', [HomeController::class, 'products'])->name('products');

// Search page
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Category page
Route::get('/product/{slug}', [Homecontroller::class, 'products'])->name('category');

// Admin home page
Route::get('/home', [DashboardController::class, 'home'])->name('admin');

// Register
Route::get('register', [DashboardController::class, 'showFormRegister'])->name('show-form-register');
Route::post('register', [DashboardController::class, 'register'])->name('register');

// Login
Route::get('login', [DashboardController::class, 'showFormLogin'])->name('show-form-login');
Route::post('login', [DashboardController::class, 'login'])->name('login');

// Profile (requires login)
Route::group(['middleware' => 'checklogin'], function () {
    Route::get('profile', [DashboardController::class, 'showProfile'])->name('show-profile');
    Route::post('profile', [DashboardController::class, 'profile'])->name('profile');

    // Admin routes (requires admin role)
    Route::group(['middleware' => 'checkadmin'], function () {
        Route::get('/admin-product', [ProductController::class, 'index'])->name('adminProduct');
        Route::get('/admin-order', [OrderController::class, 'index'])->name('adminOrder');
        Route::get('/admin-account', [AccountController::class, 'index'])->name('adminAccount');
        Route::resource('/product', ProductController::class);
    });
});

// Logout
Route::get('logout', [DashboardController::class, 'logout'])->name('logout');

// Role and permission (requires authentication)
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
});

// Forget and reset password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Dashboard (requires authentication and verified email)
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);

// Verify user account
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

// Wishlist (requires authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist/{product}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{product}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});

// Books
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');


// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'processPayment'])->name('checkout.processPayment');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

// Product detail
Route::get('/products/{product}', 'ProductController@show')->name('products.show');

// Session data (for debugging)
Route::get('/session-data', function () {
    dd(session()->all());
});

// Delete cart items
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/remove-item', [CartController::class, 'removeItem'])->name('cart.removeItem');

// Order detail
Route::get('/order/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('order.detail');

// Edit order (admin)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('orders', OrderController::class);
});

// Delete order
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::delete('orders/{order}', 'App\Http\Controllers\Admin\OrderController@destroy')->name('orders.destroy');

// gọi phương thức clearCartItems():
Route::get('/clear-cart-items', 'CheckoutController@clearCartItems')->name('clear.cart.items');
