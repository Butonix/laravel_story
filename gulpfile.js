const elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(mix => {
    // mix.sass('app.scss')
    //    .webpack('app.js');
// });

elixir(function(mix) {
    mix.styles([
        'bootstrap.min.css',
        'user.css',
        'sweetalert.css'
    ]);
    mix.webpack('app.js');
    mix.scripts([
      'jquery-3.1.1.js',
      'bootstrap.min.js',
      'vue-strap.min.js',
      'sweetalert.min.js'
    ]);
    mix.browserSync({
        proxy: 'localhost'
    });
});
