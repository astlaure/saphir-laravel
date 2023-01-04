let mix = require('laravel-mix');

mix
  .setPublicPath('public')
  .disableSuccessNotifications()

  // .js('resources/js/app.js', 'public/js/app.js').vue({ version: 3 })
  // .sass("resources/sass/app.scss", "public/css/app.css", [])

  .js('resources/js/auth.js', 'public/js/auth.js')
  .sass("resources/sass/auth.scss", "public/css/auth.css", []);

if (mix.inProduction()) {
  mix.version();
}
