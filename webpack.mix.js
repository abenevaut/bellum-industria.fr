const {mix} = require('laravel-mix');

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

mix
	/**
	 * Core frontend layouts
	 */
	.copyDirectory('resources/assets/img', 'public/img')
	.copyDirectory('resources/assets/bower/font-awesome/fonts', 'public/css/frontend/fonts')
	.styles(
		[
			'resources/assets/bower/bootstrap/dist/css/bootstrap.css',
			'resources/assets/bower/font-awesome/css/font-awesome.css'
		],
		'public/css/frontend/layouts/core.css'
	)
	.scripts(
		[
			'resources/assets/bower/jquery/dist/jquery.js',
			'resources/assets/bower/bootstrap/dist/js/bootstrap.js',
			'resources/assets/js/core.js',
			'resources/assets/js/app.js',
			'resources/assets/js/googleanalytics.js'
		],
		'public/js/frontend/layouts/core.js'
	)
	/**
	 * Default layout
	 */
	.styles(
		[
			'resources/assets/plugins/animate/animate.css',
			'resources/assets/css/theme.css',
			'resources/assets/css/custom.css'
		],
		'public/css/frontend/layouts/default.css'
	)
	/**
	 * Frontend home
	 */
	.styles(
		[
			'resources/assets/bower/owl-carousel/owl-carousel/owl.carousel.css',
			'resources/assets/css/frontend/home/index.css'
		],
		'public/css/frontend/home/index.css'
	)
	.scripts(
		[
			'resources/assets/bower/masonry/dist/masonry.pkgd.js',
			'resources/assets/bower/imagesloaded/imagesloaded.pkgd.js',
			'resources/assets/bower/owl-carousel/owl-carousel/owl.carousel.js',
			'resources/assets/js/frontend/home/index.js'
		],
		'public/js/frontend/home/index.js'
	)
	/**
	 * Frontend contacts
	 */
	.scripts(
		[
			'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
			'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
			'resources/assets/plugins/gmaps/gmaps.js',
			'resources/assets/plugins/gmaps/prettify.js',
			'resources/assets/js/frontend/contacts/index.js'
		],
		'public/js/frontend/contacts/index.js'
	);

if (mix.config.inProduction) {
	mix.version();
}
