const mix = require("laravel-mix");

const path = require("path");
module.exports = {
    resolve: {
        alias: {
            // resolve `jQuery` with actual `jquery` module
            jQuery: path.resolve(__dirname, "node_modules/jquery"),
        },
    },
};

mix.webpackConfig((webpack) => {
    return {
        plugins: [
            new webpack.ProvidePlugin(
                {
                    $: "jquery",
                    jQuery: "jquery",
                    "window.jQuery": "jquery",
                },
                {
                    AOS: "aos",
                }
            ),
        ],
    };
});

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sourceMaps();

mix.js("resources/js/vue.js", "public/js").vue({ version: 3 });
