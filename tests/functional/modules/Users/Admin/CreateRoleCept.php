<?php
// @group users
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users create role page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'CMK7kodQ']);
$I->amOnPage('/admin/roles/create');
$I->see('#CVEPDB CMS');
