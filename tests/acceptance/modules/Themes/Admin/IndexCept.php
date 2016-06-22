<?php
// @group installed
$I = new ThemesAcceptanceTester($scenario);
$I->wantTo('Test Themes index');
$I->login();
$I->amOnPage('/admin/themes');
$I->see('#CVEPDB CMS');
