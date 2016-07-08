<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users index without filter');
$I->login();
$I->amOnPage('/admin/users');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
