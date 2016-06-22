<?php
// @env module
// @group users
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users create role page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/roles/create');
$I->see('#CVEPDB CMS');
