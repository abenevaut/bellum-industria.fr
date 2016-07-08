<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users create page');
$I->login();
$I->amOnPage('/admin/users/create');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
