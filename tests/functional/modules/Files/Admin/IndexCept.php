<?php
// @group files
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Files index');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/files');
$I->see('#CVEPDB CMS');
