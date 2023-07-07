<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Userontroller;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/prod/{slug}', [Homecontroller::class, 'singleProducts'])->name('singleProducts');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');

Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');

Route::get('/articles', [HomeController::class, 'articles'])->name('articles');

Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/product/{slug}', [Homecontroller::class, 'products'])->name('category');

Route::get('/home', [DashboardController::class, 'home'])->name('admin');



Route::group(['middleware' => 'checklogin'], function () {
    Route::get('profile', [DashboardController::class, 'showProfile'])->name('show-profile');
    Route::post('profile', [DashboardController::class, 'profile'])->name('profile');
});

// Route::group(['middleware'=>'checkadmin'],function(){
Route::get('/admin-product', [ProductController::class, 'index'])->name('adminProduct');

Route::get('/admin-order', [OrderController::class, 'index'])->name('adminOrder');

Route::get('/admin-account', [AccountController::class, 'index'])->name('adminAccount');

Route::resource('/product', ProductController::class);

Auth::routes();

//login - register - logout
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//role and peemission
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    // Route::resource('products', ProductController::class);
});


//forget and reset password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

