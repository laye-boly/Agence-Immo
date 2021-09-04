var Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */

    // Debut ajout des css

    .addEntry('app', './assets/css/header.css')
    .addEntry('home', './assets/css/home.css')
    .addEntry('show', './assets/css/show.css')
    .addEntry('bootstrap', './assets/bootstrap/css/bootstrap.css')
    .addEntry('style_index', './assets/css/style_index.css')
    .addEntry('common-style', './assets/css/common-style.css')
    

    // Fin ajout des css

    // Début ajout des fonts

    .addEntry('font-awesome.min', './assets/font-awesome/css/font-awesome.min.css')

    // Fin ajout des fonts

    // Debut ajout des js

    // .addEntry('jquery.min', './assets/jquery/jquery.min.js')
    .addEntry('base', './assets/js/base.js')
    .addEntry('new_immeuble', './assets/js/new_immeuble.js')
    .addEntry('delete_image', './assets/js/delete_image.js')
    .addEntry('new_cite', './assets/js/new_cite.js')
    .addEntry('new_centre', './assets/js/new_centre.js')
    .addEntry('new_fonctionnalite', './assets/js/new_fonctionnalite.js')
    .addEntry('bootstrap.min', './assets/bootstrap/js/bootstrap.min.js')
    .addEntry('jquery.easing.min', './assets/jquery/jquery.easing.min.js')
    .addEntry('script', './assets/jquery/script.js')
    .addEntry('jquery.min', './assets/jquery/jquery.min.js')
    .addEntry('change_intro_section', './assets/js/change_intro_section.js')
    .addEntry('form_search', './assets/js/form_search.js')
    
    // Fin ajout des js
    

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // enables @babel/preset-env polyfills
    .configureBabel(() => {}, {
        useBuiltIns: 'usage',
        corejs: 3
    })

    // enables Sass/SCSS support
    //.enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes(Encore.isProduction())

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()

    // uncomment if you use API Platform Admin (composer req api-admin)
    //.enableReactPreset()
    //.addEntry('admin', './assets/js/admin.js')
;

module.exports = Encore.getWebpackConfig();
