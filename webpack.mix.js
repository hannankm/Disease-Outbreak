const mix = require('laravel-mix')
const path = require('path')
// const config = require('./webpack.config')

const alias = {
    '@': path.resolve(__dirname, 'resources/js'),
};

// mix.webpackConfig(config)

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .alias(alias)
    .options({
      processCssUrls: false,
      postCss: [
        require('autoprefixer'),
      ],
    });
