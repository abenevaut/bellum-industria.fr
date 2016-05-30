<?php
// @group users
// @group admin
$I = new FunctionalTester($scenario);
$I->wantTo('Test Users login page');
$I->amOnPage('/login');
$I->see('#CVEPDB CMS');
