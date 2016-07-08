<?php
// @group installed
$I = new UsersAcceptanceTester($scenario);
$I->wantTo('Test Users register page');
$I->amOnPage('/register');
