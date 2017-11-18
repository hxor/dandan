<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;


class VerifyJWTToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try{
            $user = JWTAuth::toUser($request->input('token'));
        }catch (Exception $e) {
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json([
                    'status' => '401',
                    'data' => null,
                    'message' => 'token_expired'
                ], $e->getStatusCode());
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json([
                    'status' => '401',
                    'data' => null,
                    'message' => 'token_expired'
                ], $e->getStatusCode());
            }else{
                return response()->json([
                    'status' => '401',
                    'data' => null,
                    'message' => 'token_required'
                ]);
            }
        }
        return $next($request);
    }
}
