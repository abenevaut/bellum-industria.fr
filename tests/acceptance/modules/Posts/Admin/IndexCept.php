<?php
// @group posts
// @group admin
$I = new PostsAcceptanceTester($scenario);
$I->wantTo('Test Posts index');
$I->login();
$I->amOnPage('/admin/posts');
$I->see('#CVEPDB CMS');
