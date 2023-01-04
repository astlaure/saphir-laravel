<?php

namespace Astlaure\Saphir\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class I18nLocale {
    public function handle(Request $request, Closure $next) {
        $supported = config('saphir.i18n.supported');
        $default = config('saphir.i18n.default');
        $parts = explode('/', request()->path());

        $locale = $parts[0] ?? '';

        if (!in_array($locale, $supported)) {
            App::setLocale($default);
        } else {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
