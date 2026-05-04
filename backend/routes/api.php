<?php

use App\Http\Controllers\auth\Login;
use App\Http\Controllers\auth\Logout;
use App\Http\Controllers\auth\Register;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(["prefix" => 'v1'], function () {
    Route::post('/register', Register::class);
    Route::middleware(['web'])->group(function () {
        Route::post('/login', Login::class);
        Route::post('/logout', Logout::class)->middleware('auth');
    });
});
