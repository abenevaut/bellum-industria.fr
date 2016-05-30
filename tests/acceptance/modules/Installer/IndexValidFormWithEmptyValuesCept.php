<?php
// @env installer
$I = new InstallerAcceptanceTester($scenario);
$I->wantTo('Test Installer form with empty value');
$I->amOnPage('/installer');
$I->see('#CVEPDB CMS');

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

$I->seeElement($I->div_error('core_site_name'));
$I->see($I->trans_field_required(), $I->div_error('core_site_name'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_site_name'));

$I->seeElement($I->div_error('core_site_description'));
$I->see($I->trans_field_required(), $I->div_error('core_site_description'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_site_description'));

$I->seeElement($I->div_error('core_url'));
$I->see($I->trans_field_required(), $I->div_error('core_url'));
$I->dontSee($I->trans_field_max(254), $I->div_error('core_url'));
$I->dontSee($I->trans_field_url(), $I->div_error('core_url'));

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
$I->see($I->trans_field_required(), $I->div_error('password'));
$I->dontSee($I->trans_field_max(60), $I->div_error('password'));
$I->dontSee($I->trans_field_min(6), $I->div_error('password'));

$I->dontSeeElement($I->div_error('password_confirmation'));
$I->dontSee($I->trans_field_required(), $I->div_error('password_confirmation'));
$I->dontSee($I->trans_field_max(60), $I->div_error('password_confirmation'));
$I->dontSee($I->trans_field_min(6), $I->div_error('password_confirmation'));
$I->dontSee($I->trans_password_confirmed(), $I->div_error('password_confirmation'));

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
