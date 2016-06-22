<?php
// @group installed
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users create page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/users/create');
$I->see('#CVEPDB CMS');
