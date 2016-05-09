<?php

/**
 * Class InstallerFunctionalTester
 */
class InstallerFunctionalTester extends FunctionalTester
{

	public function trans_field_required()
	{
		return trans('installer::installer.error:field_required');
	}

	public function trans_field_url()
	{
		return trans('installer::installer.error:field_url');
	}

	public function trans_field_email()
	{
		return trans('installer::installer.error:field_email');
	}

	public function trans_password_confirmed()
	{
		return trans('installer::installer.error:password_confirmed');
	}

	public function trans_db_connection()
	{
		return trans('installer::installer.error:db_connection');
	}

	public function trans_field_max($value)
	{
		return str_replace(":max", "$value", trans('installer::installer.error:field_max'));
	}

	public function trans_field_min($value)
	{
		return str_replace(":min", "$value", trans('installer::installer.error:field_min'));
	}

	public function div_error($id)
	{
		return "#$id-error";
	}
}
