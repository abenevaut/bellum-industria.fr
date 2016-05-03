<?php
// @group users
// @group front
// @group loggedin
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users edit profile page');
$I->amLoggedAs(['email' => 'antoine@cvepdb.fr', 'password'=> 'CMK7kodQ']);
$I->amOnPage('/users/edit-my-profile');
$I->see('#CVEPDB CMS');
