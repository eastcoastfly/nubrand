let mix = require('laravel-mix');

mix
    .js('assets/js/scripts.js', 'dist/scripts.js')
    .sass('assets/scss/style.scss', 'dist/style.css')
    .options({
        processCssUrls: false
    });
