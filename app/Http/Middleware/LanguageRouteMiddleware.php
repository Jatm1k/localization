<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageRouteMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $prefix = Language::routePrefix();
        $currentLanguage = app()->getLocale();
        if($prefix === $currentLanguage) {
            return $next($request);
        }

        $url = $this->generateUrl($request, $currentLanguage, $prefix);

        return redirect($url);
    }

    private function generateUrl(Request $request, string $currentLanguage, string|null $prefix): string
    {
        $url = $currentLanguage;
        $segments = $request->segments();
        $prefix && array_shift($segments);
        $url .= '/' . implode('/', $segments);

        if($query = request()->getQueryString()) {
            $url .= '?' . $query;
        }

        return $url;
    }
}
