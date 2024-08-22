<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
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
        if (request('lang')) {
            $language = request('lang');
        } elseif (session('language')) {
            $language = session('language');
        } else {
            $language = config('app.locale');
        }

        if (isset($language) && in_array($language, config('app.available_language'))) {
            session()->put('language', $language);
            app()->setLocale($language);
        }

        return $next($request);
    }
}
