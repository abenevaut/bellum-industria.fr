<?php

namespace abenevaut\Domain\Socials\Facebook\Repositories;

class FacebookRepository
{

	public function getPublication()
	{
		//		$fb = new \Facebook\Facebook([
		//			'app_id'                => env('FACEBOOK_CONSUMER_KEY'),
		//			'app_secret'            => env('FACEBOOK_CONSUMER_SECRET'),
		//			'default_graph_version' => 'v2.9',
		//			'default_access_token'  => env('FACEBOOK_ACCESS_TOKEN'), // optional
		//		]);

		// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
		//   $helper = $fb->getRedirectLoginHelper();
		//   $helper = $fb->getJavaScriptHelper();
		//   $helper = $fb->getCanvasHelper();
		//   $helper = $fb->getPageTabHelper();

		//		try
		//		{
		//			// Get the \Facebook\GraphNodes\GraphUser object for the current user.
		//			// If you provided a 'default_access_token', the '{access-token}' is optional.
		//			$response = $fb->get('/me', env('FACEBOOK_ACCESS_TOKEN'));
		//		}
		//		catch (\Facebook\Exceptions\FacebookResponseException $e)
		//		{
		//			// When Graph returns an error
		//			echo 'Graph returned an error: ' . $e->getMessage();
		//			exit;
		//		}
		//		catch (\Facebook\Exceptions\FacebookSDKException $e)
		//		{
		//			// When validation fails or other local issues
		//			echo 'Facebook SDK returned an error: ' . $e->getMessage();
		//			exit;
		//		}
		//
		//		$me = $response->getGraphUser();
		//		dd($me->getName());
	}
}
