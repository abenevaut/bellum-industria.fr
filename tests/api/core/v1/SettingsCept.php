<?php 
$I = new ApiTester($scenario);
$I->wantTo('perform actions and see result');

// http://codeception.com/docs/10-WebServices#.Vx4676NcRBc
// http://codeception.com/docs/modules/REST#Example

//$I->sendAjaxGetRequest('settings/get', ['key' => 'test']);
//$I->seeResponseCodeIs(405);
//
//$I->sendAjaxPostRequest('settings/get', ['key' => 'test']);
//$I->seeResponseCodeIs(200);
//$I->seeResponseIsJson();
//$I->dontseeResponseContains('{"result":"ok"}');