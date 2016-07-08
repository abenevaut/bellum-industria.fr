<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users edit role page');
$I->login();
$I->amOnPage('/admin/roles/1/edit');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
