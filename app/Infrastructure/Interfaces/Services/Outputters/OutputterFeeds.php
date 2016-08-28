<?php namespace CVEPDB\Contracts\Services\Outputters;

use CVEPDB\Abstracts\Services\Outputters\AbsOutputterFeedsFormat;

interface OutputterFeeds
{
    /**
     * @param OutputterFeedsFormat $format
     * @param array $data
     * @param string $uri
     * @param string $feeds_cache_file_prefix
     * @param int $feeds_cache_time
     * @return mixed
     */
    public function generateFeeds(
        OutputterFeedsFormat $format,
        array $data,
        $uri,
        $feeds_cache_file_prefix,
        $feeds_cache_time = 3600
    );
}
