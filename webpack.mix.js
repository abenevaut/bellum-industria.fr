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
 * Core frontend layouts - gameforest
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
	 * Dashboard backend layouts - pages
	 */
	.copyDirectory('resources/assets/css/backend/layouts/fonts', 'public/css/backend/fonts')
	.copyDirectory('resources/assets/css/backend/layouts/ico', 'public/css/backend/layouts/ico')
	.copyDirectory('resources/assets/css/backend/layouts/img', 'public/css/backend/layouts/img')
	.copyDirectory('resources/assets/plugins/codrops-dialogFx', 'public/plugins/codrops-dialogFx')
	.copyDirectory('resources/assets/plugins/font-awesome/fonts', 'public/css/backend/fonts')
	.styles(
		[
			'resources/assets/plugins/pace/pace-theme-flash.css',
			'resources/assets/plugins/bootstrapv3/css/bootstrap.min.css',
			'resources/assets/plugins/font-awesome/css/font-awesome.css',
			'resources/assets/plugins/jquery-scrollbar/jquery.scrollbar.css',
			'resources/assets/plugins/select2/css/select2.min.css',
			'resources/assets/plugins/switchery/css/switchery.min.css',
			'resources/assets/plugins/nvd3/nv.d3.min.css',
			'resources/assets/plugins/mapplic/css/mapplic.css',
			'resources/assets/plugins/rickshaw/rickshaw.min.css',
			'resources/assets/plugins/bootstrap-datepicker/css/datepicker3.css',
			'resources/assets/plugins/jquery-metrojs/MetroJs.css',
			'resources/assets/css/backend/layouts/pages-icons.css',
			'resources/assets/css/backend/layouts/pages.css'
		],
		'public/css/backend/layouts/dashboard.css'
	)
	.scripts(
		[
			'resources/assets/plugins/pace/pace.min.js',
			'resources/assets/plugins/jquery/jquery-1.11.1.min.js',
			'resources/assets/plugins/modernizr.custom.js',
			'resources/assets/plugins/jquery-ui/jquery-ui.min.js',
			'resources/assets/plugins/bootstrapv3/js/bootstrap.min.js',
			'resources/assets/plugins/jquery/jquery-easy.js',
			'resources/assets/plugins/jquery-unveil/jquery.unveil.min.js',
			'resources/assets/plugins/jquery-bez/jquery.bez.min.js',
			'resources/assets/plugins/jquery-ios-list/jquery.ioslist.min.js',
			'resources/assets/plugins/jquery-actual/jquery.actual.min.js',
			'resources/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js',
			'resources/assets/plugins/select2/js/select2.full.min.js',
			'resources/assets/plugins/classie/classie.js',
			'resources/assets/plugins/switchery/js/switchery.min.js',
			'resources/assets/plugins/jquery-metrojs/MetroJs.min.js',
			'resources/assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
			'resources/assets/plugins/skycons/skycons.js',
			'resources/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
			'resources/assets/js/backend/layouts/pages.js',
			'resources/assets/js/backend/layouts/scripts.js'
		],
		'public/js/backend/layouts/dashboard.js'
	)
	/**
	 * Default layout - gameforest
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
	 * Default emails layout
	 */
	.styles(
		[
			'resources/assets/css/emails_theme.css'
		],
		'public/css/frontend/layouts/emails_theme.css'
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
	)
	/**
	 * Backend dashboard
	 */
	.scripts(
		[
			'resources/assets/plugins/nvd3/lib/d3.v3.js',
			'resources/assets/plugins/nvd3/nv.d3.min.js',
			'resources/assets/plugins/nvd3/src/utils.js',
			'resources/assets/plugins/nvd3/src/tooltip.js',
			'resources/assets/plugins/nvd3/src/interactiveLayer.js',
			'resources/assets/plugins/nvd3/src/models/axis.js',
			'resources/assets/plugins/nvd3/src/models/line.js',
			'resources/assets/plugins/nvd3/src/models/lineWithFocusChart.js',
			'resources/assets/plugins/mapplic/js/hammer.js',
			'resources/assets/plugins/mapplic/js/jquery.mousewheel.js',
			'resources/assets/plugins/mapplic/js/mapplic.js',
			'resources/assets/plugins/rickshaw/rickshaw.min.js',
			'resources/assets/js/backend/dashboard/dashboard.js'
		],
		'public/js/backend/dashboard/dashboard.js'
	);

if (mix.config.inProduction) {
	mix.version();
}
