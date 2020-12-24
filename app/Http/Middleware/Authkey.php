<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authkey
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
         $token = $request->header('APP_key');
         if($token != 'dfscwqqx%'){
           return response()->json(['message'=> 'App Key Not Found.'], 401);
         }
        return $next($request);
    }
}
