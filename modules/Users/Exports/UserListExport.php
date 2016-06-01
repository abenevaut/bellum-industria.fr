<?php namespace Modules\Users\Exports;

use \Maatwebsite\Excel\Files\NewExcelFile;

/**
 * Class UserListExport
 * @package Modules\Users\Exports
 */
class UserListExport extends NewExcelFile
{
	/**
	 * @return string
	 */
	public function getFilename()
	{
		return 'export_users_list_' . date('Y-m-d_H-i-s');
	}

	/**
	 * @return array
	 */
	public function getModelColumns()
	{
		return [];
	}
}
