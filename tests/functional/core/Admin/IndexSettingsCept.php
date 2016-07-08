<?php
// @group core
$I = new FunctionalTester($scenario);
$I->wantTo('Test Core settings page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/settings');
$I->see('#CVEPDB CMS');
