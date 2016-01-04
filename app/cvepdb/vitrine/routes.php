<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
//Route::group(['prefix' => 'auth'], function () {
//    // Registration routes...
//    Route::get('register', 'Auth\AuthController@getRegister');
//    Route::post('register', 'Auth\AuthController@postRegister');
//
//    // Authentication routes...
//    Route::get('login', 'Auth\AuthController@getLogin');
//    Route::post('login', 'Auth\AuthController@postLogin');
//    Route::get('logout', 'Auth\AuthController@getLogout');
//
//    // Social Login
//    Route::get('login/{provider?}', ['uses' => 'Auth\AuthController@redirectToProvider']);
//    // Login callbacks
//    Route::get('login/callback/{provider?}', ['uses' => 'Auth\AuthController@handleProviderCallback']);
//
//});
//
//Route::group(['prefix' => 'password'], function () {
//    // Password reset link request routes...
//    Route::get('email', 'Auth\PasswordController@getEmail');
//    Route::post('email', 'Auth\PasswordController@postEmail');
//    // Password reset routes...
//    Route::get('reset/{token}', 'Auth\PasswordController@getReset');
//    Route::post('reset', 'Auth\PasswordController@postReset');
//});

// Group Vitrine
Route::group(['domain' => env('APP_HOSTNAME')], function () {

    Route::get('/', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('index', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('home', '\App\CVEPDB\Vitrine\Controllers\IndexController@index');
    Route::get('about', '\App\CVEPDB\Vitrine\Controllers\IndexController@about');
    Route::get('services', '\App\CVEPDB\Vitrine\Controllers\IndexController@services');
    Route::get('boutique', '\App\CVEPDB\Vitrine\Controllers\IndexController@boutique');
    Route::get('contact', '\App\CVEPDB\Vitrine\Controllers\IndexController@contact');
    Route::get('contact', ['as' => 'contact', 'uses' => '\App\CVEPDB\Vitrine\Controllers\AboutController@create']);
    Route::post('contact', ['as' => 'contact_store', 'uses' => '\App\CVEPDB\Vitrine\Controllers\AboutController@store']);

    Route::group(['prefix' => 'portfolio'], function () {

        Route::get('index', '\App\CVEPDB\Vitrine\Controllers\PortfolioController@index');
        Route::get('view', '\App\CVEPDB\Vitrine\Controllers\PortfolioController@view');

    });

    Route::get('/pdf/view', function() {

//        $pdf = App::make('dompdf.wrapper');
//        $pdf->loadHTML('<h1>Test</h1>');
//        return $pdf->stream();

        $pdf = PDF::loadView('cvepdb.vitrine.pdf.index', ['test' => 'test']);
        return $pdf->stream('invoice.pdf');
        return $pdf->download('invoice.pdf');

        $pdf->save('invoice.pdf');
        return ;
    });

    Route::get('sitemap', function()
    {
        // create sitemap
        $sitemap = App::make("sitemap");

        // set cache
        $sitemap->setCache('laravel.sitemap-vitrine-index', 3600);

        // Sub sitemap files
        $sitemap->addSitemap(URL::to('multigaming/sitemap'));

        // show sitemap
        return $sitemap->render('sitemapindex');
    });

    Route::get('feed', function(){

        // create new feed
        $feed = Feed::make();

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'laravelFeedKey');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            $posts = DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title = 'Your title';
            $feed->description = 'Your description';
            $feed->logo = 'http://yoursite.tld/logo.jpg';
            $feed->link = URL::to('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $posts[0]->created_at;
            $feed->lang = 'en';
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($posts as $post)
            {
                // set item's title, author, url, pubdate, description and content
                $feed->add($post->title, $post->author, URL::to($post->slug), $post->created, $post->description, $post->content);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);

    });
});
