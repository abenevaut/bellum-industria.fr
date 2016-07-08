<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users settings page');
$I->login();
$I->amOnPage('/admin/users/settings');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
