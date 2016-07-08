<?php
// @group installed
$I = new FunctionalTester($scenario);
$I->wantTo('Test Themes index');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/themes');
$I->see('#CVEPDB CMS');
