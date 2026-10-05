<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Définit la langue du site selon la langue du compte connecté.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = auth()->user()?->language ?? 'fr';

        $locales = [
            'fr',
            'en',
            'es',
            'pt',
            'de',
            'it',
            'nl',
            'tr',
            'zh',
            'ja',
        ];

        if (in_array($locale, $locales, true)) {
            App::setLocale($locale);
        } else {
            App::setLocale('fr');
        }

        return $next($request);
    }
}