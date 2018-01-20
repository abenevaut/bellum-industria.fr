const ImageminPlugin     = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin  = require('copy-webpack-plugin');
const imageminMozjpeg    = require('imagemin-mozjpeg');
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

	/*
	 * STARTING LAYOUTS ASSETS COMPILATION - STARTING LAYOUTS ASSETS COMPILATION - STARTING LAYOUTS ASSETS COMPILATION
	 * STARTING LAYOUTS ASSETS COMPILATION - STARTING LAYOUTS ASSETS COMPILATION - STARTING LAYOUTS ASSETS COMPILATION
	 * STARTING LAYOUTS ASSETS COMPILATION - STARTING LAYOUTS ASSETS COMPILATION - STARTING LAYOUTS ASSETS COMPILATION
	 */

	/**
	 * Core frontend layouts - Gameforest
	 */
	.copyDirectory('resources/assets/images', 'public/assets/images')
	.copyDirectory('resources/assets/bower/font-awesome/fonts', 'public/assets/themes/gameforest/fonts')
	.styles(
		[
			'resources/assets/bower/bootstrap/dist/css/bootstrap.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/bootstrap-datepicker/css/datepicker3.css',
			'resources/assets/bower/font-awesome/css/font-awesome.css',
            'resources/assets/plugins/animate/animate.css',
            'resources/assets/themes/Gameforest/v3.5.1/html/css/theme.css',
            'resources/assets/themes/Gameforest/v3.5.1/html/css/custom.css'
		],
		'public/assets/themes/gameforest/css/core-gameforest.css'
	)
	.scripts(
		[
			'resources/assets/bower/jquery/dist/jquery.js',
			'resources/assets/bower/bootstrap/dist/js/bootstrap.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.fr.js',
			'resources/assets/themes/Gameforest/v3.5.1/html/js/core.js',
			'resources/assets/js/app.js',
			'resources/assets/js/googleanalytics.js',
            'resources/assets/js/facebooksdk.js'
		],
		'public/assets/themes/gameforest/js/core-gameforest.js'
	)


    /**
     * Core frontend layouts - TheDocs
     */
    .copyDirectory('resources/assets/themes/TheDocs/v1.4.0/Starter-kit/assets/img', 'public/assets/themes/thedocs/img')
    .copyDirectory('resources/assets/themes/TheDocs/v1.4.0/Starter-kit/assets/fonts', 'public/assets/themes/thedocs/fonts')
    .styles(
        [
            'resources/assets/themes/TheDocs/v1.4.0/Starter-kit/assets/css/theDocs.all.css',
            'resources/assets/themes/TheDocs/v1.4.0/Starter-kit/assets/css/custom.css'
        ],
        'public/assets/themes/thedocs/css/core-thedocs.css'
    )
    .scripts(
        [
            'resources/assets/themes/TheDocs/v1.4.0/Starter-kit/assets/js/theDocs.all.js',
            'resources/assets/js/app.js',
            'resources/assets/js/googleanalytics.js',
            'resources/assets/js/facebooksdk.js'
        ],
        'public/assets/themes/thedocs/js/core-thedocs.js'
    )


    /**
     * Core backend layouts - Pages
     */
    .copyDirectory('resources/assets/themes/Pages/v2.3.0/getting_started/html/pages/fonts/', 'public/assets/themes/pages/fonts')
    .copyDirectory('resources/assets/bower/font-awesome/fonts/', 'public/assets/themes/pages/fonts')
    .copyDirectory('resources/assets/themes/Pages/v2.3.0/getting_started/html/pages/ico', 'public/assets/themes/pages/ico')
    .copyDirectory('resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/img', 'public/assets/themes/pages/img')
    .copyDirectory('resources/assets/themes/Pages/v2.3.0/getting_started/html/pages/img', 'public/assets/themes/pages/img')
    .copyDirectory('resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/codrops-dialogFx', 'public/assets/themes/pages/plugins/codrops-dialogFx')
    .copyDirectory('resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/font-awesome/fonts', 'public/assets/themes/pages/css/fonts')
    .styles(
        [
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/pace/pace-theme-flash.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/bootstrapv3/css/bootstrap.min.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/font-awesome/css/font-awesome.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-scrollbar/jquery.scrollbar.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/select2/css/select2.min.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/switchery/css/switchery.min.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/bootstrap-datepicker/css/datepicker3.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-metrojs/MetroJs.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/pages/css/pages-icons.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/pages/css/pages.css'
        ],
        'public/assets/themes/pages/css/core-pages.css'
    )
    .scripts(
        [
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/pace/pace.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery/jquery-1.11.1.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/modernizr.custom.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/bootstrapv3/js/bootstrap.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery/jquery-easy.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-unveil/jquery.unveil.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-bez/jquery.bez.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-ios-list/jquery.ioslist.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-actual/jquery.actual.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/select2/js/select2.full.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/classie/classie.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/switchery/js/switchery.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-metrojs/MetroJs.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/jquery-sparkline/jquery.sparkline.min.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/skycons/skycons.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.fr.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/pages/js/pages.js',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/js/scripts.js',
            'resources/assets/js/app.js',
            'resources/assets/js/backend/users/profiles/app-profiles.js',
            'resources/assets/js/googleanalytics.js',
            'resources/assets/js/facebooksdk.js'
        ],
        'public/assets/themes/pages/js/core-pages.js'
    )


    /**
     * Overwrite themes assets
     */
    .copyDirectory('resources/assets/favicon', 'public')
    .copyDirectory('resources/assets/images', 'public/assets/images')


    /*
	 * ENDING LAYOUTS ASSETS COMPILATION - ENDING LAYOUTS ASSETS COMPILATION - ENDING LAYOUTS ASSETS COMPILATION
	 * ENDING LAYOUTS ASSETS COMPILATION - ENDING LAYOUTS ASSETS COMPILATION - ENDING LAYOUTS ASSETS COMPILATION
	 * ENDING LAYOUTS ASSETS COMPILATION - ENDING LAYOUTS ASSETS COMPILATION - ENDING LAYOUTS ASSETS COMPILATION
	 */


	/**
	 * Frontend Home - Gameforest
	 */
    .copyDirectory('resources/assets/bower/owl-carousel/assets/ico', 'public/assets/css/frontend/home/')
    .copyDirectory('resources/assets/bower/owl-carousel/assets/img', 'public/assets/css/frontend/home/')
	.styles(
		[
			'resources/assets/bower/owl-carousel/owl-carousel/owl.carousel.css',
			'resources/assets/css/frontend/home/index.css'
		],
		'public/assets/css/frontend/home/index.css'
	)
	.scripts(
		[
			'resources/assets/bower/masonry/dist/masonry.pkgd.js',
			'resources/assets/bower/imagesloaded/imagesloaded.pkgd.js',
			'resources/assets/bower/owl-carousel/owl-carousel/owl.carousel.js',
			'resources/assets/js/frontend/home/index.js'
		],
		'public/assets/js/frontend/home/index.js'
	)


	/**
	 * Frontend contact - Gameforest
	 */
	.scripts(
		[
			'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
			'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
			'resources/assets/js/frontend/users/leads/gmaps/gmaps.js',
			'resources/assets/js/frontend/users/leads/gmaps/prettify.js',
			'resources/assets/js/frontend/users/leads/index.js'
		],
		'public/assets/js/frontend/users/leads/index.js'
	)


	/**
	 * Auth login - Gameforest
	 */
	.scripts(
		[
			'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
			'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
			'resources/assets/js/auth/login/login.js'
		],
		'public/assets/js/auth/login/login.js'
	)


	/**
	 * Auth register - Gameforest
	 */
	.scripts(
		[
			'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
			'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
			'resources/assets/js/auth/register/register.js'
		],
		'public/assets/js/auth/register/register.js'
	)


	/**
	 * Auth reset password - Gameforest
	 */
	.scripts(
		[
			'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
			'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
			'resources/assets/js/auth/reset/reset_password.js'
		],
		'public/assets/js/auth/reset/reset_password.js'
	)
	.scripts(
		[
			'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
			'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
			'resources/assets/js/auth/reset/send_email.js'
		],
		'public/assets/js/auth/reset/send_email.js'
	)


    /**
     * Frontend Documentation view - TheDocs
     */
    .scripts(
        [
            'resources/assets/js/disqus.js'
        ],
        'public/assets/js/frontend/documentations/show.js'
    )

    /**
     * Backend dashboard - Pages
     */
    .scripts(
        [
            'resources/assets/js/backend/dashboard/dashboard.js'
        ],
        'public/assets/js/backend/dashboard/dashboard.js'
    )
    .styles(
        [
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/nvd3/nv.d3.min.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/mapplic/css/mapplic.css',
            'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/plugins/rickshaw/rickshaw.min.css'
        ],
        'public/assets/css/backend/dashboard/dashboard.css'
    )

    /**
     * Backend users - Pages
     */
    .scripts(
        [
            'resources/assets/bower/inputmask/dist/jquery.inputmask.bundle.js',
            'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
            'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
            'resources/assets/js/backend/users/users/form.js'
        ],
        'public/assets/js/backend/users/users/form.js'
    )
    .styles(
        [
        ],
        'public/assets/css/backend/users/users/form.css'
    )

    /**
     * Backend users - Pages
     */
    .scripts(
        [
            'resources/assets/bower/inputmask/dist/jquery.inputmask.bundle.js',
            'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
            'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
            'resources/assets/js/backend/users/profiles/form.js'
        ],
        'public/assets/js/backend/users/profiles/form.js'
    )
    .styles(
        [
        ],
        'public/assets/css/backend/users/profiles/form.css'
    )


    /**
     * Backend login - Pages
     */
    .scripts(
        [
            'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
            'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
            'resources/assets/js/auth/login/login.js'
        ],
        'public/assets/js/auth/login/login.js'
    )


    /**
     * Backend register - Pages
     */
    .scripts(
        [
            'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
            'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
            'resources/assets/js/auth/register/register.js'
        ],
        'public/assets/js/auth/register/register.js'
    )


    /**
     * Backend reset password - Pages
     */
    .scripts(
        [
            'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
            'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
            'resources/assets/js/auth/reset/reset_password.js'
        ],
        'public/assets/js/auth/reset/reset_password.js'
    )
    .scripts(
        [
            'resources/assets/bower/jquery-validation/dist/jquery.validate.js',
            'resources/assets/bower/jquery-validation/src/localization/messages_fr.js',
            'resources/assets/js/app-validation.js',
            'resources/assets/js/auth/reset/send_email.js'
        ],
        'public/assets/js/auth/reset/send_email.js'
    )


    /**
     * Backend Files - Pages
     */
    .copyDirectory('resources/assets/themes/jQuery-ui-custom/v1.11.4/images', 'public/assets/css/backend/files/files/images')
    .scripts(
        [
            'resources/assets/bower/jquery-ui/jquery-ui.js',
            'resources/assets/bower/jquery-ui/ui/i18n/datepicker-fr.js'
        ],
        'public/assets/js/backend/files/files/index.js'
    )
    .scripts(
        [
            'resources/assets/themes/jQuery-ui-custom/v1.11.4/jquery-ui.css',
            'resources/assets/themes/jQuery-ui-custom/v1.11.4/jquery-ui.theme.css'
        ],
        'public/assets/css/backend/files/files/index.css'
    )
;

if (mix.config.inProduction) {
    mix
        .webpackConfig({
            plugins: [
                //Compress images
                new CopyWebpackPlugin([{
                    from: 'resources/assets/favicon',
                    to: ''
                },{
                    from: 'resources/assets/images',
                    to: 'assets/images/'
                },{
                    from: 'resources/assets/themes/TheDocs/v1.4.0/Starter-kit/assets/img',
                    to: 'assets/themes/thedocs/img'
                },{
                    from: 'resources/assets/themes/Pages/v2.3.0/getting_started/html/assets/img',
                    to: 'assets/themes/pages/img'
                },{
                    from: 'resources/assets/themes/Pages/v2.3.0/getting_started/html/pages/img',
                    to: 'assets/themes/pages/img'
                }]),
                new ImageminPlugin({
                    test: /\.(jpe?g|png|gif)$/i, // |svg
                    pngquant: {
                        quality: '65-80'
                    },
                    plugins: [
                        imageminMozjpeg({
                            quality: 65,
                            // Set the maximum memory to use in kbytes
                            maxmemory: 1000 * 512
                        })
                    ]
                })
            ]
        })
        .version();
}
