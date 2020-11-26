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
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })
    .disableSingleRuntimeChunk()
;

module.exports = Encore.getWebpackConfig();
