<?php

namespace Astlaure\Saphir;

use Astlaure\Saphir\Http\Middleware\I18nLocale;
use Astlaure\Saphir\Classes\I18n;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class SaphirServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind('i18n', function($app) {
            return new I18n();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'saphir');
    }

    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('saphir.php'),
            ], 'config');
        }

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('locale', I18nLocale::class);
    }
}
