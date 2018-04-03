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

let moduleDir='4it';
let publicDir='public';

(function() {
    let module='front';
    let from=[moduleDir,module,'resources/assets'].join('/');
    let to=[publicDir].join('/');
    mix.js(from+'/js/app.js', to+'/js')
        .sass(from+'/sass/app.scss', to+'/css');

})();

(function() {
    let module='admin';
    let from=[moduleDir,module,'resources/assets'].join('/');
    let to=[publicDir,'vendor','admin'].join('/');


})();
