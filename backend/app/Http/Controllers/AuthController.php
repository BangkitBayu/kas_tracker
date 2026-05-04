<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\registerRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function handleRegister(registerRequest $request): JsonResponse
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
        ]]);
    }

    public function handleLogin(loginRequest $request)
    {
        $credentials = $request->validated();
        // Mengambil value kotak remember me jika terisi true jika tidak false
        $remember = $request->filled('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        // Pengguna berhasil login dan sistem "Remember Me" aktif jika $remember true
        $request->session()->regenerate();
        return response()->json(['message' => 'User logged successfully', 'data' => [
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
        ]]);
    }
}
