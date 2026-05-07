<?php

use App\Http\Controllers\auth\Login;
use App\Http\Controllers\auth\Logout;
use App\Http\Controllers\auth\Register;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group(["prefix" => 'v1'], function () {
    Route::middleware(['web'])->group(function () {
        Route::post('/register', Register::class);
        Route::post('/login', Login::class);
        Route::post('/logout', Logout::class);

        // Route::post('/dashboard', Register::class)->middleware('checkusersession');
    });
});
