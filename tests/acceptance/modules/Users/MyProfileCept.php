<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users profile page');
$I->login();
$I->amOnPage('/users/my-profile');
