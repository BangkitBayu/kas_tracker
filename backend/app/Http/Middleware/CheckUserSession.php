<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $sessUser = $request->user();
        if ($sessUser !== null) {
            return $next($request);
        }
        return response()->json([
            'message' => "Unauthenticated"
        ], 401);
    }
}
