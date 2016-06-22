<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users reset password page');
$I->amOnPage('/password/reset');
$I->see('#CVEPDB CMS');
