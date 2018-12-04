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
 
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
 
 // BABEL config
mix.webpackConfig({
   resolve: {
      alias: {
          '@': path.resolve('./resources/assets/js'),
          '@c': path.resolve('./resources/assets/js/components'),
          '@a': path.resolve('./resources/assets/js/assets'),
          '@s': path.resolve('./resources/assets/js/store'),
          '@v': path.resolve('./resources/assets/js/views'),
          '@r': path.resolve('./resources/assets/js/router')
      }
  },
 
 }) 

 

 