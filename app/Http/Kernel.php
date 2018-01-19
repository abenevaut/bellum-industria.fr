<?php

namespace bellumindustria\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use bellumindustria\Infrastructure\Interfaces\Domain\Users\Users\UserRolesInterface;

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
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \bellumindustria\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
		'web' => [
			\bellumindustria\Http\Middleware\EncryptCookies::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			// \Illuminate\Session\Middleware\AuthenticateSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			\bellumindustria\Http\Middleware\VerifyCsrfToken::class,
			\Illuminate\Routing\Middleware\SubstituteBindings::class,
			\bellumindustria\Http\Middleware\Locale::class,
			\bellumindustria\Http\Middleware\TimeZones::class,
		],
		'ajax' => [
			\bellumindustria\Http\Middleware\EncryptCookies::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			// \Illuminate\Session\Middleware\AuthenticateSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			\bellumindustria\Http\Middleware\VerifyCsrfToken::class,
			\Illuminate\Routing\Middleware\SubstituteBindings::class,
			\bellumindustria\Http\Middleware\AllowOnlyAjaxRequests::class,
			\bellumindustria\Http\Middleware\Locale::class,
			\bellumindustria\Http\Middleware\TimeZones::class,
		],
		'api' => [
			'throttle:60,1',
			'bindings',
		],
		UserRolesInterface::ROLE_ADMINISTRATOR => [
			'auth',
			'role:' => UserRolesInterface::ROLE_ADMINISTRATOR,
		],
		UserRolesInterface::ROLE_CUSTOMER => [
			'auth',
			'role:' => UserRolesInterface::ROLE_CUSTOMER,
		],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
		'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
		'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
		'can' => \Illuminate\Auth\Middleware\Authorize::class,
		'guest' => \bellumindustria\Http\Middleware\RedirectIfAuthenticated::class,
		'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
		'role' => \bellumindustria\Http\Middleware\AuthenticatedUserHasRole::class,
    ];
}
