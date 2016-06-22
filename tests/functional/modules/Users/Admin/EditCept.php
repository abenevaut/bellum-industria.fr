<?php
// @group installed
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users edit page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/users/1/edit');
$I->see('#CVEPDB CMS');
