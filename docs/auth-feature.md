# Auth pages

Can be provided.

# Roles RBAC

use the `role` middleware

```php
Route::prefix('admin')
            ->middleware(['auth', 'role:admin'])
```
