# Saphir Laravel

## Optional packages

1. laravel-lang/lang
2. barryvdh/laravel-ide-helper
3. barryvdh/laravel-debugbar

## Publish

### Config

`php artisan vendor:publish --provider="Astlaure\Saphir\SaphirServiceProvider" --tag="config"`

### Views

`php artisan vendor:publish --provider="Astlaure\Saphir\SaphirServiceProvider" --tag="views"`

### Assets

`php artisan vendor:publish --provider="Astlaure\Saphir\SaphirServiceProvider" --tag="assets"`

**Add --force to overwrite**

### Lang files (automatic)

`php artisan vendor:publish --provider="Astlaure\Saphir\SaphirServiceProvider" --tag="laravel-assets"`

### Symlink on windows (dev only)

`mklink /J .\public\vendor\saphir .\vendor\astlaure\saphir\public`
