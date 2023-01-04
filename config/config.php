<?php

return [
    'auth' => [
        'prefix' => '',
        'middleware' => ['web'],
        'can_register' => true,
    ],
    'i18n' => [
        'default' => config('app.locale') ?? 'en',
        'supported' => ['en', 'fr'],
    ],
];
