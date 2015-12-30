<?php

namespace App\CVEPDB\Interfaces\Outputters;

use App\CVEPDB\Interfaces\Outputters\AbsOutputterFeedsFormat;

interface IOutputterFeeds
{
    /**
     * @param AbsOutputterFeedsFormat $format
     * @param array $data
     * @param string $uri
     * @param string $feeds_cache_file_prefix
     * @param int $feeds_cache_time
     * @return mixed
     */
    public function generateFeeds(
        AbsOutputterFeedsFormat $format,
        array $data,
        $uri,
        $feeds_cache_file_prefix,
        $feeds_cache_time = 3600
    );
}
