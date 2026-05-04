<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(loginRequest $request)
    {
        $credentials = $request->validated();
        // Mengambil value kotak remember me jika terisi true jika tidak false
        $remember = $request->filled('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        // Pengguna berhasil login dan sistem "Remember Me" aktif jika $remember true
        $request->session()->regenerate();
        return response()->json(['message' => 'User logged in successfully', 'data' => [
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
        ]], 200);
    }
}
