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

    public function output($view, $data)
    {
        return view(
            $this->view_prefix . $view,
            $data
        );
    }
}