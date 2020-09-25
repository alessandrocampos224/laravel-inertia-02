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

const exec = require('child_process').exec;
require('dotenv').config();

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

const glob = require('glob')
const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
    (glob.sync('packages/resources/' + query) || []).forEach(f => {
        f = f.replace(/[\\\/]+/g, '/');
        cb(f, f.replace('resources', 'public/_dist/admin'));
    });
}

const sassOptions = {
    precision: 5
};

/*
 |--------------------------------------------------------------------------
 | Application assets
 |--------------------------------------------------------------------------
 */


mix.webpackConfig({
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "packages/resources/js"),
            "@assets": path.resolve(__dirname, "packages/resources/assets"),
            "@store": path.resolve(__dirname, "packages/resources/js/store"),
            "@plugins": path.resolve(__dirname,"packages/resources/js/utilities/plugins"),
            "@vws": path.resolve(__dirname, "packages/resources/js/Pages"),
            "@cp": path.resolve(__dirname,"packages/resources/js/components"),
            "@sass": path.resolve(__dirname, "packages/resources/sass")
        }
    },
    output: {
        chunkFilename: "_dist/admin/js/chunks/[name].[chunkhash].js"
    }
});

mix.js('packages/resources/js/app.js', 'public/_dist/admin/js')
    .sass('packages/resources/sass/app.scss', 'public/_dist/admin/css')
    .sass('packages/resources/sass/bootstrap.scss', 'public/_dist/admin/css')
    .sass('packages/resources/sass/bootstrap-extended.scss', 'public/_dist/admin/css')
    .sass('packages/resources/sass/colors.scss', 'public/_dist/admin/css')
    .sass('packages/resources/sass/components.scss', 'public/_dist/admin/css')
    .sass('packages/resources/sass/core/menu/menu-types/vertical-menu.scss', 'public/_dist/admin/css/core/menu/menu-types')
    .sass('packages/resources/sass/core/colors/palette-gradient.scss', 'public/_dist/admin/css/core/colors')
    .sass('packages/resources/sass/themes/dark-layout.scss', 'public/_dist/admin/css/themes')
    .sass('packages/resources/sass/themes/semi-dark-layout.scss', 'public/_dist/admin/css/themes')
    .sass('packages/resources/sass/pages/authentication.scss', 'public/_dist/admin/css/pages/authentication')
    .sass('packages/resources/sass/custom-rtl.scss', 'public/_dist/admin/css');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
