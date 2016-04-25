<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Test Installer form with empty value');

$faker = Faker\Factory::create();

// Cleared old emails from MailCatcher
//$I->resetEmails();

$I->amOnPage('/installer');
$I->see('#CVEPDB CMS');

// check last mail
//$I->seeInLastEmail("Sometimes all you want is to send a simple HTML email with a basic design.");

/*
 * Don't field any
 */

$I->fillField('#core_site_name', '');
$I->fillField('#core_site_description', '');
$I->fillField('#core_url', '');
$I->fillField('#first_name', '');
$I->fillField('#last_name', '');
$I->fillField('#email', '');
$I->fillField('#password', '');
$I->fillField('#password_confirmation', '');
$I->fillField('#core_db_host', '');
$I->fillField('#core_db_database', '');
$I->fillField('#core_db_username', '');
$I->fillField('#core_db_password', '');

$I->click('Install');

$I->seeElement('#CORE_SITE_NAME-error');
$I->see(trans('installer::installer.error:field_required'), '#CORE_SITE_NAME-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_SITE_NAME-error');

$I->seeElement('#CORE_SITE_DESCRIPTION-error');
$I->see(trans('installer::installer.error:field_required'), '#CORE_SITE_DESCRIPTION-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_SITE_DESCRIPTION-error');

$I->seeElement('#CORE_URL-error');
$I->see(trans('installer::installer.error:field_required'), '#CORE_URL-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_URL-error');
$I->dontSee(trans('installer::installer.error:field_url'), '#CORE_URL-error');

$I->seeElement('#first_name-error');
$I->see(trans('installer::installer.error:field_required'), '#first_name-error');
$I->dontSee(str_replace(':max', '50', trans('installer::installer.error:field_max')), '#first_name-error');

$I->seeElement('#last_name-error');
$I->see(trans('installer::installer.error:field_required'), '#last_name-error');
$I->dontSee(str_replace(':max', '50', trans('installer::installer.error:field_max')), '#last_name-error');

$I->seeElement('#email-error');
$I->see(trans('installer::installer.error:field_required'), '#email-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#email-error');
$I->dontSee(trans('installer::installer.error:field_email'), '#email-error');

$I->seeElement('#password-error');
$I->see(trans('installer::installer.error:field_required'), '#password-error');
$I->dontSee(str_replace(':max', '60', trans('installer::installer.error:field_max')), '#password-error');
$I->dontSee(str_replace(':min', '6', trans('installer::installer.error:field_min')), '#password-error');
$I->dontSee(trans('installer::installer.error:password_confirmed'), '#password-error');

$I->seeElement('#password_confirmation-error');
$I->see(trans('installer::installer.error:field_required'), '#password_confirmation-error');
$I->dontSee(str_replace(':max', '60', trans('installer::installer.error:field_max')), '#password_confirmation-error');
$I->dontSee(str_replace(':min', '6', trans('installer::installer.error:field_min')), '#password_confirmation-error');
$I->dontSee(trans('installer::installer.error:password_confirmed'), '#password_confirmation-error');

$I->seeElement('#core_db_host-error');
$I->see(trans('installer::installer.error:field_required'), '#core_db_host-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_host-error');

$I->seeElement('#core_db_database-error');
$I->see(trans('installer::installer.error:field_required'), '#core_db_database-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_database-error');

$I->seeElement('#core_db_username-error');
$I->see(trans('installer::installer.error:field_required'), '#core_db_username-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_username-error');

$I->seeElement('#core_db_password-error');
$I->see(trans('installer::installer.error:field_required'), '#core_db_password-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_password-error');
