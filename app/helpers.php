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

function css_file_rev($file, $env = 'vitrine')
{
    $list = json_decode(File::get(base_path().'/app/assets/rev/'.$env.'/css.manifest.json'));
    return $list->{$file};
}

use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;

// AWS S3
function s3( $path ){

    $file_value = \Cache::get('s3path-' . slugify($path));

    if (!$file_value) {
//        $s3 = \Storage::disk('s3');
//        $client = $s3->getDriver()->getAdapter()->getClient();
//        $bucket = \Config::get('filesystems.disks.s3.bucket');
//        $command = $client->getCommand('GetObject', ['Bucket' => $bucket, 'Key' => $path]);
//        $request = $client->createPresignedRequest($command, '+20 minutes');
//        $value = (string) $request->getUri();

        $file_value = \Storage::disk('s3')->get('assets/ico/76.png');



//        $server = ServerFactory::create([
//            'response' => new LaravelResponseFactory()
//        ]);


        \Cache::put('s3path-' . slugify($path), $file_value, 100); // 2 minutes
    }
    return $file_value;
}
