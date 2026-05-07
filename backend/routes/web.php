<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user-session', function (Request $request): JsonResponse {
    $user = $request->user();

    if ($user !== null) {
        return response()->json(['message' => "User session found", 'data' => $user], 200);
    }
    return response()->json(['message' => "Failed, your session timeout.Please login and try again."], 401);
})->middleware('web');
