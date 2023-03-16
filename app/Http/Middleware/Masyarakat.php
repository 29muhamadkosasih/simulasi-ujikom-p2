<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class Masyarakat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('level')=="admin") {
            return $next($request);
        }else{
            return redirect('/admin');
        }

    }
    // protected function redirectTo()
    // {

    //     if (session()->get('level') != 'admin' || session()->get('level') !== 'petugas'){
    //         dd('login');
    //     }
    // }
}
