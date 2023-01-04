<?php

use Astlaure\Saphir\Facades\I18n;
use Astlaure\Saphir\Http\Controllers\Auth\PasswordController;
use Astlaure\Saphir\Http\Controllers\Auth\LoginController;
use Astlaure\Saphir\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

I18n::registerRoutes(function () {
    $configuration = [
        'prefix' => config('saphir.auth.prefix'),
        'middleware' => config('saphir.auth.middleware'),
    ];

    Route::group($configuration, function() {
        Route::get('/login', [LoginController::class, 'login'])
            ->middleware(['guest'])
            ->name('login');

        Route::post('/login', [LoginController::class, 'loginPost'])
            ->middleware(['guest'])
            ->name('login.post');;

        Route::post('/logout', [LoginController::class, 'logoutPost'])
            ->middleware(['auth'])
            ->name('logout.post');


        if (config('saphir.auth.can_register')) {
            Route::get('/register', [RegistrationController::class, 'registration'])
                ->middleware(['guest'])
                ->name('registration');

            Route::post('/register', [RegistrationController::class, 'registrationPost'])
                ->middleware(['guest'])
                ->name('registration.post');
        }


        Route::get('/forgot-password', [PasswordController::class, 'forgotPassword'])
            ->middleware(['guest'])
            ->name('forgot-password');

        Route::post('/forgot-password', [PasswordController::class, 'forgotPasswordPost'])
            ->middleware(['guest'])
            ->name('forgot-password.post');

        Route::get('/reset-password', [PasswordController::class, 'resetPassword'])
            ->middleware(['guest'])
            ->name('reset-password');

        Route::post('/reset-password', [PasswordController::class, 'resetPasswordPost'])
            ->middleware(['guest'])
            ->name('reset-password.post');
    });
});
