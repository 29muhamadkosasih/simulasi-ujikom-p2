<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

// class Authenticate extends Middleware
class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return redirect('/');
    //     //    return redirect()->back();
    //     // dd('asdf');
    //     }
    // }
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::user()) {
            return $next($request);
            // dd('masuk');
        }else{
            return redirect('/');
            // dd('tidak masuk');
        }

    }
}

