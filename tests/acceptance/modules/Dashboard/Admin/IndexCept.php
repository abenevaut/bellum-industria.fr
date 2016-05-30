<?php
// @group dashboard
// @group admin
$I = new DashboardAcceptanceTester($scenario);
$I->wantTo('Test Dashboard index');
$I->login();
$I->amOnPage('/admin/dashboard');
$I->see('#CVEPDB CMS');
