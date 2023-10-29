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
        if ($id = $request->cookie('language')) {
            $language = Language::findActive($id);
            $language && app()->setLocale($id);
        }
        return $next($request);
    }
}
