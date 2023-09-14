<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Logic to determine the desired locale (from user preferences, session, etc.)
        $locale = session('locale', config('app.locale'));

        // Set the application locale
        App::setLocale($locale);

        // After processing, redirect back to the previous URL
        return $next($request);
    }
}
