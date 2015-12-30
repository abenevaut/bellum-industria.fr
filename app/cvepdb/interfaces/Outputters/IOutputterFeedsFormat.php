<?php

namespace App\CVEPDB\Interfaces\Outputters;

interface IOutputterFeedsFormat
{
    public function getTitle();
    public function getAuthor();
    public function getId();
    public function getCreated();
    public function getDescription();
    public function getContent();
}
