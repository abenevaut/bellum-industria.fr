<?php

namespace App\CVEPDB\Interfaces\Outputters;

use App;
use URL;
use Session;
use Redirect;

use \Creitive\Breadcrumbs\Breadcrumbs as Breadcrumbs;

class AbsLaravelOutputter implements IOutputter, IOutputterHTML, IOutputterSitemap
{
    /**
     * @var Breadcrumbs|null
     */
    protected $breadcrumbs = null;

    public function __construct()
    {
        $this->breadcrumbs = new Breadcrumbs;
    }

    /**
     * @param string $identifier
     * @param string $uri
     */
    public function addBreadcrumb($identifier, $uri)
    {
        $this->breadcrumbs->addCrumb($identifier, $uri);
    }

    /**
     * @param string $divider
     */
    public function setBreadcrumbDivider($divider)
    {
        $this->breadcrumbs->setDivider($divider);
    }

    /**
     * @param string $partial_path
     * @param array $partial_data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function output($partial_path, $partial_data)
    {
        return view(
            $partial_path,
            ['breadcrumbs' => $this->breadcrumbs] + $partial_data
        );
    }

    /**
     * @param string $uri
     */
    public function redirectTo($uri)
    {
        redirect($uri);
    }

    /**
     * @param string $route
     */
    public function routeTo($route)
    {
        return Redirect::route($route);
    }

    /**
     * @param array $uris
     * @param string $sitemap_cache_file_prefix
     * @param int $sitemap_cache_time
     * @return mixed
     */
    public function generateSitemapIndex(
        array $uris,
        $sitemap_cache_file_prefix,
        $sitemap_cache_time = 3600
    )
    {
        $sitemap = App::make("sitemap");
        $sitemap->setCache('laravel.' . $sitemap_cache_file_prefix, $sitemap_cache_time);

        foreach ($uris as $uri) {
            $sitemap->addSitemap(URL::to($uri));
        }
        return $sitemap->render('sitemapindex');
    }

    /**
     * @param AbsOutputterSitemapFormat $format
     * @param array $data
     * @param string $uri
     * @param string $sitemap_file_prefix
     * @param string $sitemap_cache_file_prefix
     * @param int $sitemap_cache_time
     * @return mixed
     */
    public function generateSitemap(
        AbsOutputterSitemapFormat $format,
        array $data,
        $uri,
        $sitemap_file_prefix,
        $sitemap_cache_file_prefix,
        $sitemap_cache_time = 3600
    )
    {
        $counter = 0;
        $sitemapCounter = 0;

        $sitemap = App::make("sitemap");

        foreach ($data as $row) {
            if ($counter < 50000) {
                $sitemap->add(
                    !empty($format->getLoc()) ? url($uri . $row[$format->getLoc()]) : null,
                    !empty($format->getLastModification()) ? $row[$format->getLastModification()] : null,
                    !empty($format->getPriority()) ? $row[$format->getPriority()] : null,
                    !empty($format->getFreq()) ? $row[$format->getFreq()] : null,
                    !empty($format->getImages()) ? $row[$format->getImages()] : null,
                    !empty($format->getTitle()) ? $row[$format->getTitle()] : null,
                    !empty($format->getTranslations()) ? $row[$format->getTranslations()] : null,
                    !empty($format->getVideos()) ? $row[$format->getVideos()] : null,
                    !empty($format->getGooglenews()) ? $row[$format->getGooglenews()] : null,
                    !empty($format->getAlternates()) ? $row[$format->getAlternates()] : null
                );

                $counter++;
            } else {
                $sitemap->store('xml', $sitemap_file_prefix . $sitemapCounter);
                $sitemap->addSitemap(url($sitemap_file_prefix . $sitemapCounter . '.xml'));
                $sitemap->model->resetItems();

                $counter = 0;
                $sitemapCounter++;
            }
        }

        if (!empty($sitemap->model->getItems())) {
            $sitemap->store('xml', $sitemap_file_prefix . $sitemapCounter);
            $sitemap->addSitemap(url($sitemap_file_prefix . $sitemapCounter . '.xml'));
            $sitemap->model->resetItems();
        }

        $sitemap->setCache('laravel.' . $sitemap_cache_file_prefix, $sitemap_cache_time);
        return $sitemap->render('sitemapindex', 'sitemap');
    }
}