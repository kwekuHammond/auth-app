const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').version();

mix.options({
    hmrOptions: {
        host: 'localhost',
        port: 8001
    }
})

mix.setPublicPath('public');
