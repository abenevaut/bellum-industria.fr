<?php
// @group users
// @group front
// @group loggedin
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users profile page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'secret']);
$I->amOnPage('/users/my-profile');
$I->see('#CVEPDB CMS');
