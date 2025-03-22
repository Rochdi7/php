<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
{
    \Log::info('Language Middleware is running');

    if (Session::has('locale')) {
        \Log::info('Session locale exists: ' . Session::get('locale'));
        App::setLocale(Session::get('locale'));
    } else {
        \Log::info('Session locale NOT found, using default');
        App::setLocale(config('app.locale'));
    }

    return $next($request);
}

}
