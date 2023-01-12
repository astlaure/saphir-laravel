let mix = require('laravel-mix');

mix
  .setPublicPath('public')
  .disableSuccessNotifications()

  .js('resources/js/admin/index.js', 'public/js/admin.js').vue({ version: 3 })
  .sass("resources/sass/admin.scss", "public/css/admin.css", [])

  .js('resources/js/auth/index.js', 'public/js/auth.js')
  .sass("resources/sass/auth.scss", "public/css/auth.css", []);

if (mix.inProduction()) {
  mix.version();
}
