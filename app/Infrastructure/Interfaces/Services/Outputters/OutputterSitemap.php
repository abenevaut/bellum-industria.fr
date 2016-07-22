<?php namespace CVEPDB\Contracts\Services\Outputters;

interface OutputterSitemap
{
    /**
     * @param array $uris
     * @param string $sitemap_cache_file_prefix
     * @param int $sitemap_cache_time
     * @return mixed
     */
    public function generateSitemapIndex(
        array $uris,
        $sitemap_cache_file_prefix,
        $sitemap_cache_time
    );

    /**
     * @param OutputterSitemapFormat $format
     * @param array $data
     * @param string $uri
     * @param string $sitemap_file_prefix
     * @param string $sitemap_cache_file_prefix
     * @param int $sitemap_cache_time
     * @return mixed
     */
    public function generateSitemap(
        OutputterSitemapFormat $format,
        array $data,
        $uri,
        $sitemap_file_prefix,
        $sitemap_cache_file_prefix,
        $sitemap_cache_time
    );
}
