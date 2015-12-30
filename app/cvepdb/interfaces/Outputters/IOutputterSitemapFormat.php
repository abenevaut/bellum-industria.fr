<?php

namespace App\CVEPDB\Interfaces\Outputters;

interface IOutputterSitemapFormat
{
    public function getLoc();
    public function getLastModification();
    public function getPriority();
    public function getFreq();
    public function getImages();
    public function getTitle();
    public function getTranslations();
    public function getVideos();
    public function getGooglenews();
    public function getAlternates();
}
