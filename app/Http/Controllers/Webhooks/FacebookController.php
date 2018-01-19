<?php namespace bellumindustria\Http\Controllers\Webhook;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Http\Controllers\Auth\AuthRedirectTrait;
use bellumindustria\Http\Request\Webhook\FacebookCancelSubscriptionToApp;
use bellumindustria\Domain\Users\ProvidersTokens\Repositories\ProvidersTokensRepositoryEloquent;

class FacebookController extends ControllerAbstract
{

	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles \Authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;
	use AuthRedirectTrait;

	/**
	 * @var ProvidersTokensRepositoryEloquent|null
	 */
	protected $r_providers_tokens = null;

	/**
	 * FacebookController constructor.
	 *
	 * @param ProvidersTokensRepositoryEloquent $r_providers_tokens
	 */
	public function __construct(ProvidersTokensRepositoryEloquent $r_providers_tokens)
	{
		$this->r_providers_tokens = $r_providers_tokens;
	}

	/**
	 * Alerts hook that allow Facebook to call when app users cancel subscription to the app.
	 */
	public function cancelSubscriptionToApp(FacebookCancelSubscriptionToApp $request)
	{
		/*
		 * @xabe todo : Manage to remove user providers_tokens when leaving the app
		 */
		return abort(204);
	}
}
