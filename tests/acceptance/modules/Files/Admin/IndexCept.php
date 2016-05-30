<?php
// @group files
// @group admin
$I = new FilesAcceptanceTester($scenario);
$I->wantTo('Test Files index');
$I->login();
$I->amOnPage('/admin/files');
$I->see('#CVEPDB CMS');
