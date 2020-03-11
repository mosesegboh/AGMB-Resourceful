var elixir = require('laravel-elixir');

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

elixir(function(mix) {

    mix.sass('app.scss', './public/css/app.css');
    
    mix.styles([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/bootstrap-datepicker.min.css',
        'resources/assets/css/font-awesome.min.css',
        'resources/assets/css/animate.min.css',
        'resources/assets/css/lightbox.css',
        'resources/assets/css/main.css',
        'resources/assets/css/responsive.css',
        'public/css/app.css'
    ], 'public/css/all.css', './');
    
    mix.scripts([
        'resources/assets/js/jquery.js',
        'resources/assets/js/bootstrap.min.js',
        'resources/assets/js/bootstrap-datepicker.min.js',
        'resources/assets/js/jquery.isotope.min.js',
        'resources/assets/js/lightbox.min.js',
        'resources/assets/js/wow.min.js',
        'resources/assets/js/jSignature.min.js',
        // 'resources/assets/js/signature_pad.js',
        'resources/assets/js/main.js',
        'resources/assets/js/custom.js'
    ], 'public/js/all.js', './');

    mix.scripts([
        'resources/assets/js/flashcanvas.js'
    ], 'public/js/flashcanvas.js', './');
    
    mix.version(['public/css/all.css', 'public/js/all.js', 'public/js/flashcanvas.js']);
    
    mix.copy('resources/assets/fonts', './public/fonts')
    	.copy('public/images', '.public/build/images');
    
});
