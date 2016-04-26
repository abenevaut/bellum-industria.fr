<?php

/**
 * Class InstallerAcceptanceTester
 */
class InstallerAcceptanceTester extends AcceptanceTester
{
    /**
     * according with js translation : themes/adminlte/bower/cvepdbjs/scripts/globalize/locale_en.js
     */

    public function trans_field_required()
    {
        return 'This field is required';
    }

    public function trans_field_url()
    {
        return 'This field have to be a valid URL (starts with http:// or https://)';
    }

    public function trans_field_email()
    {
        return 'This field have to be a valid email';
    }

    public function trans_password_confirmed()
    {
        return str_replace("%text%", "password", 'Please enter the same "%text%" as above');
    }

    public function trans_db_connection()
    {
        return trans('installer::installer.error:db_connection');
    }

    public function trans_field_max($value)
    {
        return str_replace("%text%", "$value", 'This field must be at maximum %text% characters long');
    }

    public function trans_field_min($value)
    {
        return str_replace("%text%", "$value", 'This field must be at least %text% characters long');
    }

    public function div_error($id)
    {
        return "#$id-error";
    }
}
