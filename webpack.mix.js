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
    .sass('packages/resources/sass/app.scss', 'public/_dist/admin/css');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
