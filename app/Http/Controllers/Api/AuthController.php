<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwtauth', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['success' => 'false'], 401);
        }

        return response()->json(['success' => 'true','token' => $token], 200);
    }

    public function checktoken(){
        return response()->json(['success' => 'true'], 200);
    }

    public function logout(){
        $logout = auth()->logout();
        return response()->json(['success' => 'true','message' => 'You already logged out'], 200);
    }

}