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

function css_file_rev($file, $env = 'admin')
{
    $list = json_decode(File::get(base_path().'/public/assets/rev/'.$env.'/css.manifest.json'));
    return $list->{$file};
}

function find_view($view, $view_prefix, $current_module, $data = [])
{
    $current_prefix = $view_prefix;

    try {
        \Theme::view($view);
    } catch (\InvalidArgumentException $e) {
        $current_prefix = $current_module;
    }
    return view($current_prefix . $view, $data);
}