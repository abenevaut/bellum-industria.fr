<?php
// @group installed
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users index without filter');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/users');
$I->see('#CVEPDB CMS');
