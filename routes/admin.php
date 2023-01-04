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
        Route::get('/{slug}', [AdminController::class, 'dashboard'])
            ->where('slug', '.*')
            ->name('saphir.dashboard');
    });
});
