<?php
// @group users
// @group admin
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users settings page');
$I->login();
$I->amOnPage('/admin/users/settings');
$I->see('#CVEPDB CMS');
