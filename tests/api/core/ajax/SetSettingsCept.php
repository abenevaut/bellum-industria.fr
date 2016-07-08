<?php
// @group ajax
// @group core
$I = new AdminApiTester($scenario);
$I->wantTo('Set settings by Ajax (ajax/settings/set)');

// http://codeception.com/docs/10-WebServices#.Vx4676NcRBc
// http://codeception.com/docs/modules/REST#Example

/*
 * Bad method format request
 */

$I->sendAjaxGetRequest('ajax/settings/set', [
	'setting_key'   => 'test',
	'setting_value' => 'test'
]);
$I->seeResponseCodeIs(405);

/*
 * Valid request
 */

$I->sendAjaxPostRequest('ajax/settings/set', [
	'setting_key'   => 'test',
	'setting_value' => 'test'
]);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('{"test":"test"}');
