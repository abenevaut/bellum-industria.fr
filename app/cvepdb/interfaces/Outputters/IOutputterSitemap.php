<?php

namespace App\CVEPDB\Interfaces\Outputters;

interface IOutputterSitemap
{
    /**
     * @param array $uris
     * @param string $sitemap_cache_file_prefix
     * @param int $sitemap_cache_time
     * @return mixed
     */
    public function generateSitemapIndex(
        $uris,
        $sitemap_cache_file_prefix,
        $sitemap_cache_time
    );

    /**
     * @param AbsOutputterSitemapFormat $format
     * @param array $data
     * @param string $uri
     * @param string $sitemap_file_prefix
     * @param string $sitemap_cache_file_prefix
     * @param int $sitemap_cache_time
     * @return mixed
     */
    public function generateSitemap(
        AbsOutputterSitemapFormat $format,
        $data,
        $uri,
        $sitemap_file_prefix,
        $sitemap_cache_file_prefix,
        $sitemap_cache_time
    );
}
