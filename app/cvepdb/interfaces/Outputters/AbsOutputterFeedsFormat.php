<?php

namespace App\CVEPDB\Interfaces\Outputters;

abstract class AbsOutputterFeedsFormat implements IOutputterFeedsFormat
{
    /**
     * @var array
     */
    public $header = [];

    public function getTitle()
    {
        return null;
    }

    public function getAuthor()
    {
        return null;
    }

    public function getId()
    {
        return null;
    }

    public function getCreated()
    {
        return null;
    }

    public function getDescription()
    {
        return null;
    }

    public function getContent()
    {
        return null;
    }
}
