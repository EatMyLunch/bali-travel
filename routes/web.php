<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AboutController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::resource('banners', BannerController::class);
Route::resource('packages', PackageController::class);
Route::resource('videos', VideoController::class);
Route::resource('orders', OrderController::class);
Route::resource('about', AboutController::class);

Route::get('/bookings/data', [BookingController::class, 'getData'])->name('bookings.getData');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/order/{id}', [BookingController::class, 'order'])->name('bookings.order');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');