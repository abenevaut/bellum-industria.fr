<?php 
$I = new ApiTester($scenario);
$I->wantTo('perform actions and see result');

// http://codeception.com/docs/10-WebServices#.Vx4676NcRBc
// http://codeception.com/docs/modules/REST#Example

//$I->amHttpAuthenticated('service_user', '123456');
//$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendPOST('settings/get', ['key' => 'test']);
//$I->seeResponseCodeIs(200);
//$I->seeResponseIsJson();
$I->dontseeResponseContains('{"result":"ok"}');