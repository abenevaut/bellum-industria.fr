<?php
// @env module
// @group users
// @group front
// @group loggedin
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users profile page');
$I->login();
$I->amOnPage('/users/my-profile');
$I->see('#CVEPDB CMS');
