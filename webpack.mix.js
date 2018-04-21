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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/assets/js/secretary/SecretaryController/lecturersManage/lecturersManage.js', 'public/js');
mix.js('resources/assets/js/secretary/SecretaryController/studentsManage/studentsManage.js', 'public/js');
mix.js('resources/assets/js/secretary/SecretaryController/fieldManage/fieldManage.js', 'public/js');
// amdin
mix.js('resources/assets/js/admin/AdministratorController/protectionManage/protectionManage.js', 'public/js');
mix.js('resources/assets/js/admin/AdministratorController/protectionManageId/protectionManageId.js', 'public/js');

