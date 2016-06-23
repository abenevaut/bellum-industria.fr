<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users login page');
$I->amOnPage('/admin/login');
$I->see('#CVEPDB CMS'); // header
$I->see('I forgot my password'); // footer
$I->see('Register a new membership'); // footer
