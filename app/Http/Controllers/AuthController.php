<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token'), 201);
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }


    /////// view ////////

    public function viewLogin()
    {
        $pageTitle = 'Login';
        return view(
            'pages.auth.index',
            compact('pageTitle')
        );
    }

    public function clientLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized']);
        }

        $user = JWTAuth::user();

        Auth::loginUsingId($user->id);

        return redirect()->away('/');
    }


    public function viewRegister()
    {
        $pageTitle = 'Register';
        return view(
            'pages.auth.register',
            compact('pageTitle')
        );
    }

    public function clientRegister(Request $request)
    {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->away('/login')->with('success', 'Appointment Created!.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
}