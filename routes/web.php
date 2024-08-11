<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PackageController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::resource('banners', BannerController::class);
Route::resource('packages', PackageController::class);