<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JWTAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try{
            $user = JWTAuth::parseToken()->authenticate();
        }catch(JWTException $e){
            if($e instanceof TokenExpiredException){
                $newToken = JWTAuth::parseToken()->refresh();
                return response()->json(['success' => false, 'token' => $newToken, 'status' => 'expired'],200);
            }elseif($e instanceof TokenInvalidException){
                return response()->json(['success' => false, 'message' => 'token invalid'],401);
            }else{
                return response()->json(['success' => false, 'message' => 'token not found'],401);
            }
        }
        return $next($request);
    }
}
