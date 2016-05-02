<?php
// @group themes
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Themes index');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'CMK7kodQ']);
$I->amOnPage('/admin/themes');
$I->see('#CVEPDB CMS');
