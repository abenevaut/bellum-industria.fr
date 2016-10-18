<?php namespace CVEPDB\Contracts\Services\Outputters;

interface OutputterFeedsFormat
{
    public function getTitle();
    public function getAuthor();
    public function getId();
    public function getCreated();
    public function getDescription();
    public function getContent();
}
