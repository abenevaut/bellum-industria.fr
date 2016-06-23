<?php
// @group installed
$I = new DashboardAcceptanceTester($scenario);
$I->wantTo('Test Dashboard index');
$I->login();
$I->amOnPage('/admin/dashboard');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
