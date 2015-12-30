<?php

namespace App\CVEPDB\Multigaming\Outputters\FeedsFormats;

use App\CVEPDB\Interfaces\Outputters\AbsOutputterFeedsFormat;

class TeamFormat extends AbsOutputterFeedsFormat
{
    public function __construct()
    {
        $this->header = [
            'title' => 'Feed title',
            'description' => 'Feed title',
            'logo_url' => 'Feed title',
            'site_url' => 'Feed title',
            'first_post' => date('Y/m/d'), // date du premier post
            'lang' => 'Feed title',
        ];
    }

    public function getTitle()
    {
        return 'name';
    }

    public function getAuthor()
    {
        return '';
    }

    public function getId()
    {
        return 'id';
    }

    public function getCreated()
    {
        return '';
    }

    public function getDescription()
    {
        return '';
    }

    public function getContent()
    {
        return '';
    }
}