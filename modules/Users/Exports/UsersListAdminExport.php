<?php namespace Modules\Users\Exports;

/**
 * Class UsersListAdminExport
 * @package Modules\Users\Exports
 */
class UsersListAdminExport extends \Maatwebsite\Excel\Files\NewExcelFile
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
        return [
            'id AS 0',
            'last_name AS 1',
            'first_name AS 2',
            'email AS 3'
        ];
    }
}
