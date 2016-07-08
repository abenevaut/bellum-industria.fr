<?php
// @group installed
$I = new PagesAcceptanceTester($scenario);
$I->wantTo('Test Pages index');
$I->login();
$I->amOnPage('/admin/pages');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
