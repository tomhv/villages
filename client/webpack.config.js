var path = require('path');
var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .enableVueLoader()
    .enablePostCssLoader()
    .addAliases({
        '@': path.resolve(__dirname, 'assets', 'js')
    })
;

module.exports = Encore.getWebpackConfig();
