<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(registerRequest $request): JsonResponse
    {
        $request->validated();

        $newUser = User::create([
            'fullname' => $request['fullname'],
            'username' => $request['username'],
            'school' => $request['school'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'],)
        ]);

        return response()->json(['message' => 'User registered successfully', 'data' => [
            'id' => $newUser['id'],
            'fullname' => $newUser['fullname'],
            'username' => $newUser['username'],
            'school' => $newUser['school'],
            'email' => $newUser['email'],
            'created_at' => $newUser['created_at'],
        ]], 201);
    }
}
