<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users edit profile page');
$I->login();
$I->amOnPage('/users/edit-my-profile');
$I->see('#CVEPDB CMS');
