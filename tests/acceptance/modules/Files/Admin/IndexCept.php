<?php
// @group installed
$I = new FilesAcceptanceTester($scenario);
$I->wantTo('Test Files index');
$I->login();
$I->amOnPage('/admin/files');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
