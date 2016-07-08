<?php
// @env installer
// @group installer
$I = new InstallerFunctionalTester($scenario);
$I->wantTo('Test Installer form with too short values');
$I->amOnPage('/installer');
$I->see('#CVEPDB CMS');

/*
 * Field the form with too short values
 */

$I->fillField('#core_site_name', '');
$I->fillField('#core_site_description', '');
$I->fillField('#core_url', '');
$I->fillField('#first_name', '');
$I->fillField('#last_name', '');
$I->fillField('#email', '');
$I->fillField('#password', '12');
$I->fillField('#password_confirmation', '12');
$I->fillField('#core_db_host', '');
$I->fillField('#core_db_database', '');
$I->fillField('#core_db_username', '');
$I->fillField('#core_db_password', '');

$I->click('Install');

$I->seeElement($I->div_error('CORE_SITE_NAME'));
$I->see($I->trans_field_required(), $I->div_error('CORE_SITE_NAME'));
$I->dontSee($I->trans_field_max(254), $I->div_error('CORE_SITE_NAME'));

$I->seeElement($I->div_error('CORE_SITE_DESCRIPTION'));
$I->see($I->trans_field_required(), $I->div_error('CORE_SITE_DESCRIPTION'));
$I->dontSee($I->trans_field_max(254), $I->div_error('CORE_SITE_DESCRIPTION'));

$I->seeElement($I->div_error('CORE_URL'));
$I->see($I->trans_field_required(), $I->div_error('CORE_URL'));
$I->dontSee($I->trans_field_max(254), $I->div_error('CORE_URL'));
$I->dontSee($I->trans_field_url(), $I->div_error('CORE_URL'));

$I->seeElement($I->div_error('first_name'));
$I->see($I->trans_field_required(), $I->div_error('first_name'));
$I->dontSee($I->trans_field_max(50), $I->div_error('first_name'));

$I->seeElement($I->div_error('last_name'));
$I->see($I->trans_field_required(), $I->div_error('last_name'));
$I->dontSee($I->trans_field_max(50), $I->div_error('last_name'));

$I->seeElement($I->div_error('email'));
$I->see($I->trans_field_required(), $I->div_error('email'));
$I->dontSee($I->trans_field_max(254), $I->div_error('email'));
$I->dontSee($I->trans_field_email(), $I->div_error('email'));

$I->seeElement($I->div_error('password'));
$I->dontSee($I->trans_field_required(), $I->div_error('password'));
$I->dontSee($I->trans_field_max(60), $I->div_error('password'));
$I->see($I->trans_field_min(6), $I->div_error('password'));
$I->dontSee($I->trans_password_confirmed(), $I->div_error('password'));

$I->seeElement($I->div_error('password_confirmation'));
$I->dontSee($I->trans_field_required(), $I->div_error('password_confirmation'));
$I->dontSee($I->trans_field_max(60), $I->div_error('password_confirmation'));
$I->see($I->trans_field_min(6), $I->div_error('password_confirmation'));

$I->seeElement($I->div_error('core_db_host'));
$I->see($I->trans_field_required(), $I->div_error('core_db_host'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_db_host'));

$I->seeElement($I->div_error('core_db_database'));
$I->see($I->trans_field_required(), $I->div_error('core_db_database'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_db_database'));

$I->seeElement($I->div_error('core_db_username'));
$I->see($I->trans_field_required(), $I->div_error('core_db_username'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_db_username'));

$I->seeElement($I->div_error('core_db_password'));
$I->see($I->trans_field_required(), $I->div_error('core_db_password'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_db_password'));

$I->dontSeeElement('.callout.callout-danger');
$I->dontSee($I->trans_db_connection(), '.callout.callout-danger');
