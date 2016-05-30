<?php
// @group users
// @group front
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users login page');
$I->amOnPage('/login');
$I->see('#CVEPDB CMS');
