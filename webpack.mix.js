const mix = require('laravel-mix');

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

// For frontend layout
mix.js('resources/assets/frontend/js/custom.js', 'public/assets/frontend/js/custom.js');
mix.js('resources/assets/frontend/js/editor.js', 'public/assets/frontend/js/editor.js');

// For backend layout
mix.js('resources/assets/backend/js/admin.js', 'public/assets/backend/js/admin.js');
mix.js('resources/assets/backend/js/helpers.js', 'public/assets/backend/js/helpers.js');

mix.copyDirectory('resources/assets/plugins', 'public/assets/plugins');
mix.copyDirectory('resources/assets/frontend/css', 'public/assets/frontend/css');
mix.copyDirectory('resources/assets/backend/css', 'public/assets/backend/css');
mix.copyDirectory('resources/assets/frontend/fonts', 'public/assets/frontend/fonts');
mix.copyDirectory('resources/assets/frontend/images', 'public/assets/frontend/images');



