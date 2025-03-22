<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            // Default to French if no language is set
            App::setLocale('fr');
        }
        return $next($request);
    }
}
