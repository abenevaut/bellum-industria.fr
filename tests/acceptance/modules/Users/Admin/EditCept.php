<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users edit page');
$I->login();
$I->amOnPage('/admin/users/1/edit');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
