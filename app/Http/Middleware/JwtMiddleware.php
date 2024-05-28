<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JwtMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            // Set the authenticated user in the Auth facade
            Auth::setUser($user);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return redirect('/login')->with('error', 'Token is invalid');
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return redirect('/login')->with('error', 'Token has expired');
        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Authorization token not found');
        }

        return $next($request);
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     if (!JWTAuth::parseToken()->authenticate() || !JWTAuth::check()) {
    //         // return response()->json([
    //         //     'error' => 'Unauthorized'
    //         // ], 401);
    //         return redirect('/login');
    //     }
    //     $user = JWTAuth::parseToken()->authenticate();
    //     Auth::setUser($user);
    //     return $next($request);
    // }
}
