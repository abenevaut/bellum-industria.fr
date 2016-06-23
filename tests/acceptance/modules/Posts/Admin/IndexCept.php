<?php
// @group installed
$I = new PostsAcceptanceTester($scenario);
$I->wantTo('Test Posts index');
$I->login();
$I->amOnPage('/admin/posts');
#$I->see('CMS'); // header
#$I->see('Copyright © 2016 #CVEPDB. All rights reserved.'); // footer
