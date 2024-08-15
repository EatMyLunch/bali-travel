<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/bookings/data', [BookingController::class, 'getData'])->name('bookings.getData');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/order/{id}', [BookingController::class, 'order'])->name('bookings.order');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::resource('about', AboutController::class);

// Admin auth routes
Route::get('/admin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Protected admin routes
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::resource('banners', BannerController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('access', AccessController::class);
});
