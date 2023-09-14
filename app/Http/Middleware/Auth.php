<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth
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
          if (session()->get('accessToken') == null || session()->get('accessToken') == '') {
               session()->flash('route', $request->route()->getName());
               return redirect()->route('login');
          }
          return $next($request);
     }
}