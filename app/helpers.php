<?php

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text))
    {
        return 'n-a';
    }

    return $text;
}

function css_file_rev($file)
{
    $current_theme = \Theme::getCurrent();
    $list = json_decode(\File::get(base_path().'/public/themes/'.$current_theme.'/rev/css.manifest.json'));
    return $list->{$file};
}

function cmsview($view, $data = [], $view_prefix = null, $current_module = null)
{
    if (is_null($view_prefix)) {
        $view_prefix = \Theme::getCurrent().'::';
    }

    $current_prefix = $view_prefix;

    try {
        \Theme::view($view);
    } catch (\InvalidArgumentException $e) {
        $current_prefix = $current_module;
    }
    return view($current_prefix . $view, $data);
}

function cmsview_prefix($view, $view_prefix = null, $current_module = null)
{
    if (is_null($view_prefix)) {
        $view_prefix = \Theme::getCurrent().'::';
    }

    $current_prefix = $view_prefix;

    try {
        \Theme::view($view);
    } catch (\InvalidArgumentException $e) {
        $current_prefix = $current_module;
    }
    return $current_prefix;
}