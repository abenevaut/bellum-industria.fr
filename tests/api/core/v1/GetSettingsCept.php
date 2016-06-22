<?php
// @group api
// @group core
$I = new AdminApiTester($scenario);
$I->wantTo('Get settings by API (api/v1/settings/get)');

// http://codeception.com/docs/10-WebServices#.Vx4676NcRBc
// http://codeception.com/docs/modules/REST#Example

/*
 * Non authenticated request
 */

$I->sendGET('v1/settings/get', ['setting_key' => 'test']);
$I->seeResponseCodeIs(401);
$I->seeResponseContains(
	'{"error":{"code":"GEN-UNAUTHORIZED","http_code":401,"message":"Unauthorized"}}'
);

/*
 * Valid request
 */

$I->setHeader(config('apiguard.keyName'), $I->getApiAdminToken());
$I->haveHttpHeader(config('apiguard.keyName'), $I->getApiAdminToken());
$I->sendGET('v1/settings/get', ['setting_key' => 'test']);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('{"test":"test"}');
