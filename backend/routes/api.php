<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(["prefix" => 'v1'], function () {
    Route::post('/register', [AuthController::class, 'handleRegister']);
    Route::middleware(['web'])->group(function() {
        Route::post('/login', [AuthController::class, 'handleLogin']);
    });
});
