<?php
namespace FormularioAplicacao\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \FormularioAplicacao\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        //\FormularioAplicacao\Http\Middleware\VerifyCsrfToken::class,
        \LucaDegasperi\OAuth2Server\Middleware\OAuthExceptionHandlerMiddleware::class,
    ];
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \FormularioAplicacao\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \FormularioAplicacao\Http\Middleware\RedirectIfAuthenticated::class,
        'csrf' => \FormularioAplicacao\Http\Middleware\VerifyCsrfToken::class,
        'oauth' => \LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware::class,
        'oauth-user' => \LucaDegasperi\OAuth2Server\Middleware\OAuthUserOwnerMiddleware::class,
        'oauth-client' => \LucaDegasperi\OAuth2Server\Middleware\OAuthClientOwnerMiddleware::class,
        'check-authorization-params' => \LucaDegasperi\OAuth2Server\Middleware\CheckAuthCodeRequestMiddleware::class,
        'CheckProjectOwner' => \FormularioAplicacao\Http\Middleware\CheckProjectOwner::class,
    ];
}