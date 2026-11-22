<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Dashboardontroller;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->middleware(['auth', 'isAdmin'::class])->group(function () {

    Route::get('/dashboard', [Dashboardontroller::class, 'index']);

    Route::resource('categories', CategoryController::class);
});
