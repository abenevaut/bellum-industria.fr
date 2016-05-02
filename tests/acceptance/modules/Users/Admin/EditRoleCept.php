<?php
// @group users
// @group admin
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users edit role page');
$I->login();
$I->amOnPage('/admin/roles/1/edit');
$I->see('#CVEPDB CMS');
