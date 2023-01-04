# Saphir Laravel

## Optional packages

1. laravel-lang/lang
2. barryvdh/laravel-ide-helper
3. barryvdh/laravel-debugbar

## Publish

### Config

`php artisan vendor:publish --provider="Astlaure\Saphir\SaphirServiceProvider" --tag="config"`

## Add I18n

In your router file

```php
I18n::registerRoutes(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
```

This will automatically register the locale middleware and register the default route (/) and supported languages routes (/fr)

You can also use the `locale` middleware to switch the app()->locale

#### Pro Tip

You should use the route helper to not have to manage the prefix yourself

```php
{{route('forgot-password')}}
```
