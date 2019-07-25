const mix = require('laravel-mix');

mix

    .styles([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/@fortawesome/fontawesome-free/css/all.css',
        'resources/assets/libs/datatables/css/dataTables.bootstrap.min.css',
        'resources/assets/libs/datatables/css/jquery.dataTables.min.css',
    ], 'public/assets/css/libs.css')

    .scripts([
        'node_modules/jquery/dist/jquery.js'
    ], 'public/assets/js/jquery.js')

    .scripts([
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'resources/assets/libs/datatables/js/jquery.dataTables.min.js',
    ], 'public/assets/js/libs.js')

    .scripts([
        'resources/assets/js/scripts.js'
    ], 'public/assets/js/scripts.js')

    .copyDirectory('resources/assets/img', 'public/assets/img')
    .copyDirectory('resources/assets/libs/datatables', 'public/assets/libs/datatables')
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/assets/webfonts')

    .options({
        processCssUrls: false
    })

    .version()
;
