<?php
// @group users
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users create page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'CMK7kodQ']);
$I->amOnPage('/admin/users/create');
$I->see('#CVEPDB CMS');
