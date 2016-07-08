<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users roles index');
$I->login();
$I->amOnPage('/admin/roles');
$I->see('CMS'); // header
$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
