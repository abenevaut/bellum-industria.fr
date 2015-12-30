<?php

namespace App\CVEPDB\Interfaces\Outputters;

interface IOutputterPDF
{
    /**
     * @param string $partial_path
     * @param string $partial_data
     * @param string $file_name File name without extention
     * @return mixed
     */
    public function downloadPDF($partial_path, $partial_data, $file_name);

    /**
     * @param string $partial_path
     * @param string $partial_data
     * @param string $file_name File name without extention
     * @return mixed
     */
    public function displayPDF($partial_path, $partial_data, $file_name);

    /**
     * @param string $partial_path
     * @param string $partial_data
     * @param string $file_name File path with the file name without extention
     * @return mixed
     */
    public function storePDF($partial_path, $partial_data, $file_name);
}
