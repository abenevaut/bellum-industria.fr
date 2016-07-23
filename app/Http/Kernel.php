<?php namespace cms\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use cms\Domain\Users\Roles\Repositories\RolesRepositoryEloquent;
use cms\Domain\Users\Permissions\Repositories\PermissionsRepositoryEloquent;

/**
 * Class Kernel
 * @package cms\Http
 */
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
            \cms\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \cms\Http\Middleware\VerifyCsrfToken::class,
            // CVEPDB
            \cms\Http\Middleware\SetLocaleMiddleware::class,
            'CMSInstalled',
            'UserImpersonate',
        ],
        'user'      => [
            \cms\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \cms\Http\Middleware\VerifyCsrfToken::class,
            // CVEPDB
            \cms\Http\Middleware\SetLocaleMiddleware::class,
            'auth',
            'role:' . RolesRepositoryEloquent::USER,
            'CMSInstalled',
            'UserImpersonate',
        ],
        'admin'     => [
            \cms\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \cms\Http\Middleware\VerifyCsrfToken::class,
            'auth',
            'ability:' . RolesRepositoryEloquent::ADMIN . ',' . PermissionsRepositoryEloquent::ACCESS_ADMIN_PANEL,
            // CVEPDB
            \cms\Http\Middleware\SetLocaleMiddleware::class,
            'CMSInstalled'
        ],
        'api'       => [
            'throttle:60,1',
            'APIResponseHeaderJsMiddleware',
            'apiguard'
        ],
        'ajax'      => [
            'throttle:60,1',
            'APIResponseHeaderJsMiddleware',
        ],
        'installer' => [
            \cms\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \cms\Http\Middleware\VerifyCsrfToken::class,
            // CVEPDB
            \cms\Http\Middleware\SetLocaleMiddleware::class,
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
        'auth'                          => \cms\Http\Middleware\Authenticate::class,
        'auth.basic'                    => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest'                         => \cms\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle'                      => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        // Entrust
        'role'                          => \Zizaco\Entrust\Middleware\EntrustRole::class,
        'permission'                    => \Zizaco\Entrust\Middleware\EntrustPermission::class,
        'ability'                       => \Zizaco\Entrust\Middleware\EntrustAbility::class,
        // CMS specific
        'CMSAllowInstallation'          => \Modules\Installer\Http\Middleware\CMSAllowInstallation::class,
        'CMSInstalled'                  => \Modules\Installer\Http\Middleware\CMSInstalled::class,
        'APIResponseHeaderJsMiddleware' => \cms\Http\Middleware\ApiResponseHeaderJsMiddleware::class,
        'apiguard'                      => \Chrisbjr\ApiGuard\Http\Middleware\ApiGuard::class,
    ];

}
