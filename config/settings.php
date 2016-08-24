<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Cache Filename
	|--------------------------------------------------------------------------
	|
	| Cache configuration path
	|
	*/
	'cache_file'           => storage_path('app/settings.json'),

	/*
	|--------------------------------------------------------------------------
	| Table name to store settings
	|--------------------------------------------------------------------------
	|
	| Info: If you change this table name, dont forget to update your settings migrations file.
	|
	*/
	'db_table'             => 'settings',

	/*
	|--------------------------------------------------------------------------
	| Fallback setting
	|--------------------------------------------------------------------------
	|
	| Return Laravel config if the value with particular key is not found in cache or DB.
	| It will work if default value in laravel setting is not set, and this value is set to true
	|
	*/
	'fallback'             => true,

	/*
    |--------------------------------------------------------------------------
    | Settings form names as config names
    |--------------------------------------------------------------------------
    |
    | @seealso SettingsOutputter
    |
    */
	'form_key_to_settings' => [
		'cms_site_name'                   => 'cms.site.name',
		'cms_site_description'            => 'cms.site.description',
		'cms_site_logo'                   => 'cms.site.logo',
		'cms_site_favico'                 => 'cms.site.favico',
		'mail_from_address'                => 'mail.from.address',
		'mail_from_name'                   => 'mail.from.name',
		'cms_mail_mailwatch'              => 'cms.mail.mailwatch',
		'mail_driver'                      => 'mail.driver',
		'mail_host'                        => 'mail.host',
		'mail_port'                        => 'mail.port',
		'mail_encryption'                  => 'mail.encryption',
		'mail_username'                    => 'mail.username',
		'mail_password'                    => 'mail.password',
		'services_bitbucket_client_id'     => 'services.bitbucket.client_id',
		'services_bitbucket_client_secret' => 'services.bitbucket.client_secret',
		'services_facebook_client_id'      => 'services.facebook.client_id',
		'services_facebook_client_secret'  => 'services.facebook.client_secret',
		'services_github_client_id'        => 'services.github.client_id',
		'services_github_client_secret'    => 'services.github.client_secret',
		'services_google_client_id'        => 'services.google.client_id',
		'services_google_client_secret'    => 'services.google.client_secret',
		'services_linkedin_client_id'      => 'services.linkedin.client_id',
		'services_linkedin_client_secret'  => 'services.linkedin.client_secret',
		'services_twitter_client_id'       => 'services.twitter.client_id',
		'services_twitter_client_secret'   => 'services.twitter.client_secret',
	],

];
