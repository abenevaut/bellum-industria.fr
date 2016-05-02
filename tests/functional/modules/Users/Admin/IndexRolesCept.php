<?php
// @group users
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users roles index');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'CMK7kodQ']);
$I->amOnPage('/admin/roles');
$I->see('#CVEPDB CMS');
