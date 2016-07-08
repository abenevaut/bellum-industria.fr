<?php
// @group installed
$I = new FunctionalTester($scenario);
$I->wantTo('Test Dashboard index');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/dashboard');
$I->see('#CVEPDB CMS');
