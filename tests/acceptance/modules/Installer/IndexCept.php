<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Test Installer form');

// Cleared old emails from MailCatcher
//$I->resetEmails();

$I->amOnPage('/installer');
$I->see('#CVEPDB CMS');

// check last mail
//$I->seeInLastEmail("Sometimes all you want is to send a simple HTML email with a basic design.");

$I->fillField('#core_site_name', str_random(255));
$I->fillField('#core_site_description', str_random(255));
$I->fillField('#core_url', str_random(255));
$I->fillField('#first_name', str_random(255));
$I->fillField('#last_name', str_random(255));
$I->fillField('#email', str_random(255));
$I->fillField('#password', str_random(255));
$I->fillField('#password_confirmation', str_random(255));
// DB
$I->fillField('#core_db_host', str_random(255));
$I->fillField('#core_db_database', str_random(255));
$I->fillField('#core_db_username', str_random(255));
$I->fillField('#core_db_password', str_random(255));

$I->click('Install');

$I->seeElement('#CORE_SITE_NAME-error');
$I->see('This field must be at least 254 characters long', '#CORE_SITE_NAME-error');

$I->seeElement('#CORE_SITE_DESCRIPTION-error');
$I->see('This field must be at least 254 characters long', '#CORE_SITE_DESCRIPTION-error');

$I->seeElement('#CORE_URL-error');
$I->see('This field must be at least 254 characters long', '#CORE_URL-error');
$I->see('The field format is invalid. The URL have to start with "http://" or "https://"', '#CORE_URL-error');

$I->seeElement('#first_name-error');
$I->see('This field must be at least 50 characters long', '#first_name-error');

$I->seeElement('#last_name-error');
$I->see('This field must be at least 50 characters long', '#last_name-error');

$I->seeElement('#email-error');
$I->see('This field must be a valid email', '#email-error');
$I->see('This field must be at least 254 characters long', '#email-error');

$I->seeElement('#password-error');
$I->see('This field must be at least 60 characters long', '#password-error');
$I->see('The password confirmation does not match.', '#password-error');
// DB
$I->seeElement('#core_db_host-error');
$I->see('This field must be at least 254 characters long', '#core_db_host-error');

$I->seeElement('#core_db_database-error');
$I->see('This field must be at least 254 characters long', '#core_db_database-error');

$I->seeElement('#core_db_username-error');
$I->see('This field must be at least 254 characters long', '#core_db_username-error');

$I->seeElement('#core_db_password-error');
$I->see('This field must be at least 254 characters long', '#core_db_password-error');
