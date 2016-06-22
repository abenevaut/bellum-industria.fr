<?php
// @env module
// @group users
// @group admin
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users edit page');
$I->login();
$I->amOnPage('/admin/users/1/edit');
$I->see('#CVEPDB CMS');
