let mix = require('laravel-mix');

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
*/
mix.browserSync('demo.novam.com');
mix.js(
  'resources/assets/js/app.js',
  'public/js'
).sass(
  'resources/assets/sass/app.scss',
  'public/css'
).styles([
  // 'resources/assets/css/bootstrap4.min.css',
  'resources/themes/material/assets/css/bootstrap.min.css',
  'resources/themes/material/assets/css/material-dashboard.css',
  'resources/themes/material/assets/css/demo.css',
  'resources/assets/css/styles.css'
],
'public/dist/css/main.css'
).scripts([
  "resources/themes/material/assets/js/jquery-3.2.1.min.js",
  "resources/themes/material/assets/js/bootstrap.min.js",
  "resources/themes/material/assets/js/material.min.js"
],
'public/dist/js/main.js'
).scripts([
  "resources/themes/material/assets/js/chartist.min.js",
  "resources/themes/material/assets/js/arrive.min.js",
  "resources/themes/material/assets/js/perfect-scrollbar.jquery.min.js",
  "resources/themes/material/assets/js/bootstrap-notify.js"
],
'public/dist/js/plugins.js'
).scripts([
  "resources/themes/material/assets/js/material-dashboard.js",
  "resources/assets/js/scripts.js",
  "resources/themes/material/assets/js/demo.js"
],
'public/dist/js/scripts.js'
);
