<?php
// @group api
// @group admin
// @group core
$I = new AdminApiTester($scenario);
$I->wantTo('Set settings by API (v1/settings/set)');

// http://codeception.com/docs/10-WebServices#.Vx4676NcRBc
// http://codeception.com/docs/modules/REST#Example

/*
 * Bad method format request
 */

$I->sendAjaxGetRequest('v1/settings/set', [
	'setting_key'   => 'test',
	'setting_value' => 'test'
]);
$I->seeResponseCodeIs(405);

/*
 * Non autheficated request
 */

$I->sendAjaxGetRequest('v1/settings/set', [
	'setting_key'   => 'test',
	'setting_value' => 'test'
]);
$I->seeResponseCodeIs(401);

/*
 * Valid request
 */

$I->setHeader(config('apiguard.keyName'), $I->getApiAdminToken());
$I->haveHttpHeader(config('apiguard.keyName'), $I->getApiAdminToken());
$I->sendAjaxGetRequest('v1/settings/set', [
	'setting_key'   => 'test',
	'setting_value' => 'test'
]);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('{"setting_key":"test","setting_value":"test"}');
