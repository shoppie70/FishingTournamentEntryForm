require('laravel-mix-merge-manifest');

const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'public/assets/admin/js/admin.js')
    .sass(__dirname + '/Resources/assets/sass/app.scss', 'public/assets/admin/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    });

if (mix.inProduction()) {
    mix.version();
}
