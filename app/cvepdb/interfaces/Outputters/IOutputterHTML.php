<?php

namespace App\CVEPDB\Interfaces\Outputters;

interface IOutputterHTML
{
    /**
     * @param string $identifier The breadcrumb name will appear on HTML page
     * @param string $uri The breadcrumb URI that will be available in breadcrumb link
     * @return void
     */
    public function addBreadcrumb($identifier, $uri);

    /**
     * @param string $divider The divider (Text or HTMl)
     * @return mixed
     */
    public function setBreadcrumbDivider($divider);

    /**
     * @param string $partial_path The partial view to render
     * @param array $partial_data Data that will be displayed in view
     * @return mixed
     */
    public function output($partial_path, $partial_data);

    /**
     * @param string $uri The URI to redirect
     * @return mixed
     */
    public function redirectTo($uri);

    /**
     * @param string $route
     */
    public function routeTo($route);
}
