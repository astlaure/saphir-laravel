<?php

namespace Astlaure\Saphir\Classes;

use Illuminate\Support\Facades\Route;

class I18n {
    public function registerRoutes($action, $middlewares = []): void {
        Route::group([
            'prefix' => $this->prefix(),
            'middleware' => array_merge(['locale'], $middlewares),
        ], $action);
    }

    public function prefix(): string {
        $supported = config('saphir.i18n.supported');
        $default = config('saphir.i18n.default');
        $parts = explode('/', request()->path());

        $locale = $parts[0] ?? '';

        if (!in_array($locale, $supported) || $locale == $default) {
            return '';
        } else {
            return '/' . $locale;
        }
    }
}
