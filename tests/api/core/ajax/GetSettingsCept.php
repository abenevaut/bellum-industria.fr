<?php
// @group api
// @group admin
// @group core
$I = new AdminApiTester($scenario);
$I->wantTo('Get settings by Ajax (ajax/v1/settings/get)');

// http://codeception.com/docs/10-WebServices#.Vx4676NcRBc
// http://codeception.com/docs/modules/REST#Example

/*
 * Bad method format request
 */

$I->sendAjaxGetRequest('ajax/v1/settings/get', ['setting_key' => 'test']);
$I->seeResponseCodeIs(405);

/*
 * Non authenticated request
 */

$I->sendAjaxPostRequest('ajax/v1/settings/get', ['setting_key' => 'test']);
$I->seeResponseCodeIs(401);

/*
 * Valid request
 */

$I->sendAjaxPostRequest('ajax/v1/settings/get', ['setting_key' => 'test']);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->dontSeeResponseContains('{"test":"test"}');
