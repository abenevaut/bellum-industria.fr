<?php
// @group api
// @group admin
// @group core
$I = new AdminApiTester($scenario);
$I->wantTo('Set settings by API (api/v1/settings/set)');

// http://codeception.com/docs/10-WebServices#.Vx4676NcRBc
// http://codeception.com/docs/modules/REST#Example

/*
 * Non authenticated request
 */

$I->sendPOST('v1/settings/set', [
	'setting_key'   => 'test',
	'setting_value' => 'test'
]);
$I->seeResponseCodeIs(401);
$I->seeResponseContains(
	'{"error":{"code":"GEN-UNAUTHORIZED","http_code":401,"message":"Unauthorized"}}'
);

/*
 * Valid request
 */

$I->setHeader(config('apiguard.keyName'), $I->getApiAdminToken());
$I->haveHttpHeader(config('apiguard.keyName'), $I->getApiAdminToken());
$I->sendPOST('v1/settings/set', [
	'setting_key'   => 'test',
	'setting_value' => 'test'
]);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('{"test":"test"}');
