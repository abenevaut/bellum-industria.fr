<?php

namespace Core\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

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
	 * The application's route middleware groups.
	 *
	 * @var array
	 */
	protected $middlewareGroups = [
		'web'       => [
			'guest',
			\Core\Http\Middleware\EncryptCookies::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			\Core\Http\Middleware\VerifyCsrfToken::class,
			// CVEPDB
			\CVEPDB\Http\Middlewares\SetLocaleMiddleware::class,
			'CMSInstalled',
			'UserImpersonate',
		],
		'admin'     => [
			\Core\Http\Middleware\EncryptCookies::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			\Core\Http\Middleware\VerifyCsrfToken::class,
			'auth',
			'role:admin',
			// CVEPDB
			\CVEPDB\Http\Middlewares\SetLocaleMiddleware::class,
			'CMSInstalled'
		],
		'api'       => [
			'throttle:60,1',
			'APIResponseHeaderJsMiddleware',
			'apiguard'
		],
		'ajax' => [
			'throttle:60,1',
			'APIResponseHeaderJsMiddleware',
		],
		'installer' => [
			\Core\Http\Middleware\EncryptCookies::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			\Core\Http\Middleware\VerifyCsrfToken::class,
			// CVEPDB
			\CVEPDB\Http\Middlewares\SetLocaleMiddleware::class,
			'CMSAllowInstallation'
		]
	];

	/**
	 * The application's route middleware.
	 *
	 * These middleware may be assigned to groups or used individually.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'UserImpersonate'               => \Modules\Users\Http\Middleware\UserImpersonate::class,
		'auth'                          => \Core\Http\Middleware\Authenticate::class,
		'auth.basic'                    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'guest'                         => \Core\Http\Middleware\RedirectIfAuthenticated::class,
		'throttle'                      => \Illuminate\Routing\Middleware\ThrottleRequests::class,
		// Entrust
		'role'                          => \Zizaco\Entrust\Middleware\EntrustRole::class,
		'permission'                    => \Zizaco\Entrust\Middleware\EntrustPermission::class,
		'ability'                       => \Zizaco\Entrust\Middleware\EntrustAbility::class,
		// CMS specific
		'CMSAllowInstallation'          => \Modules\Installer\Http\Middleware\CMSAllowInstallation::class,
		'CMSInstalled'                  => \Modules\Installer\Http\Middleware\CMSInstalled::class,
		'APIResponseHeaderJsMiddleware' => \CVEPDB\Http\Middlewares\APIResponseHeaderJsMiddleware::class,
		'apiguard'                      => \Chrisbjr\ApiGuard\Http\Middleware\ApiGuard::class,
	];
}
