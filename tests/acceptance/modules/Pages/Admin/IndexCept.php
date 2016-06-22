<?php
// @group installed
$I = new PagesAcceptanceTester($scenario);
$I->wantTo('Test Pages index');
$I->login();
$I->amOnPage('/admin/pages');
$I->see('#CVEPDB CMS');
