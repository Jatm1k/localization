<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageCookieMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->cookie('language');

        if (is_null($id)) {
            return $next($request);
        }

        if (app()->isLocale($id)) {
            return $next($request);
        }

        $language = Language::findActive($id);

        $language && app()->setLocale($id);

        return $next($request);
    }
}
