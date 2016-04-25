<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Test Installer form');

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

$I->seeElement('#CORE_URL-error');
$I->see(trans('installer::installer.error:field_required'), '#CORE_URL-error');

$I->seeElement('#first_name-error');
$I->see(trans('installer::installer.error:field_required'), '#first_name-error');

$I->seeElement('#last_name-error');
$I->see(trans('installer::installer.error:field_required'), '#last_name-error');

$I->seeElement('#email-error');
$I->see(trans('installer::installer.error:field_required'), '#email-error');
$I->dontSee('This field must be a valid email', '#email-error');

$I->seeElement('#password-error');
$I->see(trans('installer::installer.error:field_required'), '#password-error');
$I->dontSee(str_replace(':max', '60', trans('installer::installer.error:field_max')), '#password-error');
$I->dontSee('The password confirmation does not match.', '#password-error');

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

/*
 * Field all with too long strings
 */

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
$I->dontSee(trans('installer::installer.error:field_required'), '#CORE_SITE_NAME-error');
$I->see(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_SITE_NAME-error');
$I->seeElement('#CORE_SITE_DESCRIPTION-error');
$I->see(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_SITE_DESCRIPTION-error');
$I->seeElement('#CORE_URL-error');
$I->see(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_URL-error');
$I->see(trans('installer::installer.error:field_url'), '#CORE_URL-error');
$I->seeElement('#first_name-error');
$I->see(str_replace(':max', '50', trans('installer::installer.error:field_max')), '#first_name-error');
$I->seeElement('#last_name-error');
$I->see(str_replace(':max', '50', trans('installer::installer.error:field_max')), '#last_name-error');
$I->seeElement('#email-error');
$I->see('This field must be a valid email', '#email-error');
$I->see(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#email-error');
$I->seeElement('#password-error');
$I->see(str_replace(':max', '60', trans('installer::installer.error:field_max')), '#password-error');
$I->see('The password confirmation does not match.', '#password-error');
// DB
$I->seeElement('#core_db_host-error');
$I->see(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_host-error');
$I->seeElement('#core_db_database-error');
$I->see(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_database-error');
$I->seeElement('#core_db_username-error');
$I->see(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_username-error');
$I->seeElement('#core_db_password-error');
$I->see(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_password-error');


/*
 * Field all with well sized strings
 */

$I->fillField('#core_site_name', str_random(50));
$I->fillField('#core_site_description', str_random(50));
$I->fillField('#core_url', str_random(50));
$I->fillField('#first_name', str_random(50));
$I->fillField('#last_name', str_random(50));
$I->fillField('#email', str_random(50));
$I->fillField('#password', str_random(50));
$I->fillField('#password_confirmation', str_random(50));
// DB
$I->fillField('#core_db_host', str_random(50));
$I->fillField('#core_db_database', str_random(50));
$I->fillField('#core_db_username', str_random(50));
$I->fillField('#core_db_password', str_random(50));

$I->click('Install');

$I->dontSeeElement('#CORE_SITE_NAME-error');
$I->dontSee(trans('installer::installer.error:field_required'), '#CORE_SITE_NAME-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_SITE_NAME-error');

$I->dontSeeElement('#CORE_SITE_DESCRIPTION-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_SITE_DESCRIPTION-error');

$I->seeElement('#CORE_URL-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_URL-error');
$I->see(trans('installer::installer.error:field_url'), '#CORE_URL-error');

$I->dontSeeElement('#first_name-error');
$I->dontSee(str_replace(':max', '50', trans('installer::installer.error:field_max')), '#first_name-error');

$I->dontSeeElement('#last_name-error');
$I->dontSee(str_replace(':max', '50', trans('installer::installer.error:field_max')), '#last_name-error');

$I->seeElement('#email-error');
$I->see('This field must be a valid email', '#email-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#email-error');

$I->seeElement('#password-error');
$I->dontSee(str_replace(':max', '60', trans('installer::installer.error:field_max')), '#password-error');
$I->see('The password confirmation does not match.', '#password-error');

// DB
$I->dontSeeElement('#core_db_host-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_host-error');

$I->dontSeeElement('#core_db_database-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_database-error');

$I->dontSeeElement('#core_db_username-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_username-error');

$I->dontSeeElement('#core_db_password-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_password-error');

/*
 * Field all with well sized and well formated strings
 */

$I->fillField('#core_site_name', str_random(50));
$I->fillField('#core_site_description', str_random(50));
$I->fillField('#core_url', $faker->url);
$I->fillField('#first_name', str_random(50));
$I->fillField('#last_name', str_random(50));
$I->fillField('#email', $faker->email);
$password = str_random(50);
$I->fillField('#password', $password);
$I->fillField('#password_confirmation', $password);
// DB
$I->fillField('#core_db_host', str_random(50));
$I->fillField('#core_db_database', str_random(50));
$I->fillField('#core_db_username', str_random(50));
$I->fillField('#core_db_password', str_random(50));

$I->click('Install');

$I->dontSeeElement('#CORE_SITE_NAME-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_SITE_NAME-error');
$I->dontSeeElement('#CORE_SITE_DESCRIPTION-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_SITE_DESCRIPTION-error');
$I->dontSeeElement('#CORE_URL-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#CORE_URL-error');
$I->dontSee(trans('installer::installer.error:field_url'), '#CORE_URL-error');
$I->dontSeeElement('#first_name-error');
$I->dontSee(str_replace(':max', '50', trans('installer::installer.error:field_max')), '#first_name-error');
$I->dontSeeElement('#last_name-error');
$I->dontSee(str_replace(':max', '50', trans('installer::installer.error:field_max')), '#last_name-error');
$I->dontSeeElement('#email-error');
$I->dontSee('This field must be a valid email', '#email-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#email-error');
$I->dontSeeElement('#password-error');
$I->dontSee(str_replace(':max', '60', trans('installer::installer.error:field_max')), '#password-error');
$I->dontSee('The password confirmation does not match.', '#password-error');
// DB
$I->dontSeeElement('#core_db_host-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_host-error');
$I->dontSeeElement('#core_db_database-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_database-error');
$I->dontSeeElement('#core_db_username-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_username-error');
$I->dontSeeElement('#core_db_password-error');
$I->dontSee(str_replace(':max', '254', trans('installer::installer.error:field_max')), '#core_db_password-error');
