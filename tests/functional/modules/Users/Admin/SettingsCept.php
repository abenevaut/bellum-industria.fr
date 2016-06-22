<?php
// @group installed
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users settings page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/users/settings');
$I->see('#CVEPDB CMS');
