<?php


use Astlaure\Saphir\Facades\I18n;
use Astlaure\Saphir\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

I18n::registerRoutes(function () {
    $configuration = [
        'prefix' => config('saphir.admin.prefix'),
        'middleware' => config('saphir.admin.middleware'),
    ];

    Route::group($configuration, function () {
        Route::get('/', [AdminController::class, 'index'])
            ->name('saphir.dashboard');

        Route::get('/locales', [AdminController::class, 'locales']);

        Route::get('/{slug}', [AdminController::class, 'index'])
            ->where('slug', '.*');
    });
});
