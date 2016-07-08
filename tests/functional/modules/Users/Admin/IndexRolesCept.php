<?php
// @group installed
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users roles index');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/roles');
$I->see('#CVEPDB CMS');
