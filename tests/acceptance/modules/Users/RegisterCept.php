<?php
// @env module
// @group users
// @group front
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users register page');
$I->amOnPage('/register');
$I->see('#CVEPDB CMS');
