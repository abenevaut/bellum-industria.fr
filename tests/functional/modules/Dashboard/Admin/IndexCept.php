<?php
// @group dashboard
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Dashboard index');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'CMK7kodQ']);
$I->amOnPage('/admin/dashboard');
$I->see('#CVEPDB CMS');
