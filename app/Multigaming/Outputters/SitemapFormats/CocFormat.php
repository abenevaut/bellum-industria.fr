<?php

namespace App\Multigaming\Outputters\SitemapFormats;

use CVEPDB\Services\Outputters\AbsOutputterSitemapFormat;

class CocFormat extends AbsOutputterSitemapFormat
{
    public function getLoc()
    {
        return urlencode('tag');
    }

    public function getLastModification()
    {
        return null;
    }

    public function getPriority()
    {
        return null;
    }

    public function getFreq()
    {
        return null;
    }

    public function getImages()
    {
        return null;
    }

    public function getTitle()
    {
        return 'name';
    }

    public function getTranslations()
    {
        return null;
    }

    public function getVideos()
    {
        return null;
    }

    public function getGooglenews()
    {
        return null;
    }

    public function getAlternates()
    {
        return null;
    }
}