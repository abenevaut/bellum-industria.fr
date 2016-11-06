<?php namespace cms\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

/**
 * Class Kernel
 * @package cms\Http
 */
class Kernel extends HttpKernel
{

	/**
	 * The application's route middleware groups.
	 *
	 * @var array
	 */
	protected $middlewareGroups = [
		'web'       => [
			\cms\Http\Middleware\EncryptCookies::class,
			\cms\Http\Middleware\VerifyCsrfToken::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			'CMSLocale',
			'CMSInstalled',
			'UserImpersonate',
		],
		'api'       => [
			'throttle:60,1',
			'APIResponseHeaderJsCVEPDBMiddleware',
		],
		'ajax'      => [
		],
		'user'      => [

			'auth',
			// 'role:admin',

			'CMSLocale',
			'CMSInstalled',
			'UserImpersonate',
		],
		'admin'     => [

			'auth',
			// 'role:admin',

			'CMSLocale',
			'CMSInstalled'
		],

		'installer' => [
			'CMSLocale',
			'CMSAllowInstallation'
		]
	];

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * These middleware are run during every request to your application.
	 *
	 * @var array
	 */
	protected $middleware = [
		\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
	];

	/**
	 * The application's route middleware.
	 *
	 * These middleware may be assigned to groups or used individually.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth'       => \Illuminate\Auth\Middleware\Authenticate::class,
		'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'bindings'   => \Illuminate\Routing\Middleware\SubstituteBindings::class,
		'can'        => \Illuminate\Auth\Middleware\Authorize::class,
		'guest'      => \cms\Http\Middleware\RedirectIfAuthenticated::class,
		'throttle'   => \Illuminate\Routing\Middleware\ThrottleRequests::class,

		'UserImpersonate'      => \cms\Modules\Users\Http\Middleware\UserImpersonate::class,
		'CMSAllowInstallation' => \cms\Modules\Installer\Http\Middleware\CMSAllowInstallation::class,
		'CMSInstalled'         => \cms\Modules\Installer\Http\Middleware\CMSInstalled::class,
		'CMSLocale'            => \cms\Http\Middleware\SetLocaleMiddleware::class,
	];
}
