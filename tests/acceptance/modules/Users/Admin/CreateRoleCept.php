<?php
// @group users
// @group admin
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users create role page');
$I->login();
$I->amOnPage('/admin/roles/create');
$I->see('#CVEPDB CMS');
