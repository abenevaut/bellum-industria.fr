<?php

namespace App\Http\Contracts;

abstract class AbsWidgets
{
    /**
     * @var string Widget title
     */
    protected $title = 'default';

    /**
     * @var string Widget description
     */
    protected $description = 'default';

    /**
     * @var string View namespace (ex : 'users::'|null)
     */
    protected $view_prefix = '';

    /**
     * @var string
     */
    protected $module = 'users';

    public function output($view, $data)
    {
        return cmsview($view, $data, $this->view_prefix, $this->module);
    }

    public function widgetInformation()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}