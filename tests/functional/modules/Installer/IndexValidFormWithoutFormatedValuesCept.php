<?php
// @group installer
$I = new InstallerFunctionalTester($scenario);
$I->wantTo('Test Installer form without formated values');
$I->amOnPage('/installer');
$I->see('#CVEPDB CMS');

/*
 * Field form with well sized values but without the right format
 */

$I->fillField('#core_site_name', str_random(25));
$I->fillField('#core_site_description', str_random(25));
$I->fillField('#core_url', str_random(25));
$I->fillField('#first_name', str_random(25));
$I->fillField('#last_name', str_random(25));
$I->fillField('#email', str_random(25));
$I->fillField('#password', str_random(25));
$I->fillField('#password_confirmation', str_random(25));
$I->fillField('#core_db_host', str_random(25));
$I->fillField('#core_db_database', str_random(25));
$I->fillField('#core_db_username', str_random(25));
$I->fillField('#core_db_password', str_random(25));

$I->click('Install');

$I->dontSeeElement($I->div_error('CORE_SITE_NAME'));
$I->dontSee($I->trans_field_required(), $I->div_error('CORE_SITE_NAME'));
$I->dontSee($I->trans_field_max(254), $I->div_error('CORE_SITE_NAME'));

$I->dontSeeElement($I->div_error('CORE_SITE_DESCRIPTION'));
$I->dontSee($I->trans_field_required(), $I->div_error('CORE_SITE_DESCRIPTION'));
$I->dontSee($I->trans_field_max(254), $I->div_error('CORE_SITE_DESCRIPTION'));

$I->seeElement($I->div_error('CORE_URL'));
$I->dontSee($I->trans_field_required(), $I->div_error('CORE_URL'));
$I->dontSee($I->trans_field_max(254), $I->div_error('CORE_URL'));
$I->see($I->trans_field_url(), $I->div_error('CORE_URL'));

$I->dontSeeElement($I->div_error('first_name'));
$I->dontSee($I->trans_field_required(), $I->div_error('first_name'));
$I->dontSee($I->trans_field_max(50), $I->div_error('first_name'));

$I->dontSeeElement($I->div_error('last_name'));
$I->dontSee($I->trans_field_required(), $I->div_error('last_name'));
$I->dontSee($I->trans_field_max(50), $I->div_error('last_name'));

$I->seeElement($I->div_error('email'));
$I->dontSee($I->trans_field_required(), $I->div_error('email'));
$I->dontSee($I->trans_field_max(254), $I->div_error('email'));
$I->see($I->trans_field_email(), $I->div_error('email'));

$I->seeElement($I->div_error('password'));
$I->dontSee($I->trans_field_required(), $I->div_error('password'));
$I->dontSee($I->trans_field_max(60), $I->div_error('password'));
$I->dontSee($I->trans_field_min(6), $I->div_error('password'));
$I->see($I->trans_password_confirmed(), $I->div_error('password'));

$I->dontSeeElement($I->div_error('password_confirmation'));
$I->dontSee($I->trans_field_required(), $I->div_error('password_confirmation'));
$I->dontSee($I->trans_field_max(60), $I->div_error('password_confirmation'));
$I->dontSee($I->trans_field_min(6), $I->div_error('password_confirmation'));

$I->dontSeeElement($I->div_error('core_db_host'));
$I->dontSee($I->trans_field_required(), $I->div_error('core_db_host'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_db_host'));

$I->dontSeeElement($I->div_error('core_db_database'));
$I->dontSee($I->trans_field_required(), $I->div_error('core_db_database'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_db_database'));

$I->dontSeeElement($I->div_error('core_db_username'));
$I->dontSee($I->trans_field_required(), $I->div_error('core_db_username'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_db_username'));

$I->dontSeeElement($I->div_error('core_db_password'));
$I->dontSee($I->trans_field_required(), $I->div_error('core_db_password'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_db_password'));

$I->dontSeeElement('.callout.callout-danger');
$I->dontSee($I->trans_db_connection(), '.callout.callout-danger');
