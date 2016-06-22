<?php
// @env core
// @group core
// @group admin
$I = new CoreAcceptanceTester($scenario);
$I->wantTo('Test Core settings page');
$I->login();
$I->amOnPage('/admin/settings');
$I->see('#CVEPDB CMS');
