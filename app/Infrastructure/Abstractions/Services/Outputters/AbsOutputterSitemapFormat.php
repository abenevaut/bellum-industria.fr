<?php namespace CVEPDB\Abstracts\Services\Outputters;

use CVEPDB\Contracts\Services\Outputters\OutputterSitemapFormat as IOutputterSitemapFormat;

abstract class AbsOutputterSitemapFormat implements IOutputterSitemapFormat
{
    public function getLoc()
    {
        return null;
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
        return null;
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
