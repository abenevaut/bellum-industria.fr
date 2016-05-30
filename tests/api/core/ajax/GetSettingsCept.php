<?php
// @group ajax
// @group admin
// @group core
$I = new AdminApiTester($scenario);
$I->wantTo('Get settings by Ajax (ajax/settings/get)');

// http://codeception.com/docs/10-WebServices#.Vx4676NcRBc
// http://codeception.com/docs/modules/REST#Example

/*
 * Bad method format request
 */

$I->sendAjaxPostRequest('ajax/settings/get', ['setting_key' => 'test']);
$I->seeResponseCodeIs(405);

/*
 * Valid request
 */

$I->sendAjaxGetRequest('ajax/settings/get', ['setting_key' => 'test']);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('{"test":"test"}');
