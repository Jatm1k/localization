<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageRouteMiddleware
{
    private string|null $prefix;
    private string $defaultLanguage;
    private string $currentLanguage;
    public function __construct()
    {
        $this->prefix = Language::routePrefix();
        $this->currentLanguage = app()->getLocale();
        $this->defaultLanguage = Language::findDefault()->id;
    }
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->currentLanguage === $this->defaultLanguage) {
            if(is_null($this->prefix)) {
                return $next($request);
            }
            return $this->redirect($request);
        }

        if($this->prefix === $this->currentLanguage) {
            return $next($request);
        }

        return $this->redirect($request);
    }

    private function redirect(Request $request): RedirectResponse
    {
        $url = $this->currentLanguage;
        $this->defaultLanguage === $this->currentLanguage && $url = '';

        $segments = $request->segments();
        $this->prefix && array_shift($segments);
        $url .= '/' . implode('/', $segments);

        if($query = request()->getQueryString()) {
            $url .= '?' . $query;
        }

        // dd($url);

        return redirect($url);
    }
}
