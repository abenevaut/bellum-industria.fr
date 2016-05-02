<?php
// @group users
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users index without filter');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'CMK7kodQ']);
$I->amOnPage('/admin/users');
$I->see('#CVEPDB CMS');
