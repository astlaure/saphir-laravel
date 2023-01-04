<?php

namespace Astlaure\Saphir\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void registerRoutes(callable $action, array $middlewares = [])
 * @method static string prefix()
 *
 * @see \Astlaure\Saphir\Classes\I18n
 */
class I18n extends Facade {
    protected static function getFacadeAccessor() {
        return 'i18n';
    }
}
