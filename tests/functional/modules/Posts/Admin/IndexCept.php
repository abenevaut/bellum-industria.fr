<?php
// @env module
// @group posts
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Posts index');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/admin/posts');
$I->see('#CVEPDB CMS');
