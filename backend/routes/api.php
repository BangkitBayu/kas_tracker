<?php

use App\Http\Controllers\auth\Login;
use App\Http\Controllers\auth\Logout;
use App\Http\Controllers\auth\Register;
use App\Http\Controllers\cash\CashController;
use App\Http\Controllers\menu\DashboardController;
use Illuminate\Support\Facades\Route;



Route::group(["prefix" => 'v1'], function () {
    Route::middleware(['web'])->group(function () {
        Route::post('/register', Register::class);
        Route::post('/login', Login::class);
        Route::post('/logout', Logout::class);

        Route::middleware(['checkUserSession'])->group(function () {
            Route::resource('dashboard/mycash', CashController::class);
            Route::resource('dashboard', DashboardController::class);
        });
        // Route::post('/dashboard', Register::class)->middleware('checkusersession');
    });
});
