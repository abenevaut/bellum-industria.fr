<?php
// @group core
$I = new CoreAcceptanceTester($scenario);
$I->wantTo('Test Core settings page');
$I->login();
$I->amOnPage('/admin/settings');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
$I->see(trans('global.settings')); // content
$I->see(trans('global.cancel')); // content
$I->see(trans('settings.btn.edit')); // content

/*
 * Tabs
 */

// General

$I->see(trans('global.general')); // content

$I->see(trans('settings.core_site_name')); // content
$I->see(trans('settings.core_site_description')); // content
$I->see(trans('settings.core_site_logo')); // content
$I->see(trans('settings.core_site_favico')); // content


// Mails

$I->see(trans('global.mails')); // content
$I->click(trans('global.mails'));

$I->see(trans('settings.mail_from_address')); // content
$I->see(trans('settings.mail_from_name')); // content
$I->see(trans('settings.core_mail_mailwatch')); // content
$I->see(trans('settings.mail_provider_title')); // content

$I->click('i.fa-plus');
$I->see(trans('settings.mail_host')); // content
$I->see(trans('settings.mail_username')); // content
$I->see(trans('settings.mail_password')); // content
$I->see(trans('settings.mail_driver')); // content
$I->see(trans('settings.mail_port')); // content
$I->see(trans('settings.mail_encryption')); // content


// Socials networks

$I->see(trans('settings.socials')); // content
$I->click(trans('settings.socials'));

$I->see(trans('settings.bitbucket')); // content
$I->click('i.fa-plus');
$I->see(trans('settings.bitbucket_client_id')); // content
$I->see(trans('settings.bitbucket_client_secret')); // content

$I->see(trans('settings.facebook')); // content
$I->click('i.fa-plus');
$I->see(trans('settings.facebook_client_id')); // content
$I->see(trans('settings.facebook_client_secret')); // content

$I->see(trans('settings.github')); // content
$I->click('i.fa-plus');
$I->see(trans('settings.github_client_id')); // content
$I->see(trans('settings.github_client_secret')); // content

$I->see(trans('settings.google')); // content
$I->click('i.fa-plus');
$I->see(trans('settings.google_client_id')); // content
$I->see(trans('settings.google_client_secret')); // content

$I->see(trans('settings.linkedin')); // content
$I->click('i.fa-plus');
$I->see(trans('settings.linkedin_client_id')); // content
$I->see(trans('settings.linkedin_client_secret')); // content

$I->see(trans('settings.twitter')); // content
$I->click('i.fa-plus');
$I->see(trans('settings.twitter_client_id')); // content
$I->see(trans('settings.twitter_client_secret')); // content
