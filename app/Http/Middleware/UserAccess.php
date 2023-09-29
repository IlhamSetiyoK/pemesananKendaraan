<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        $role = auth()->user()->type; 
        if(auth()->user()->type == $userType) {
            return $next($request);
        }
        
        
        return response()->json([
            $role,
            $userType,
            'You dont have access for this page'
        ]);
    }
}
