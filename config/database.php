<?php

return [

<<<<<<< HEAD
    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_CLASS,

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => storage_path(env('SQLITE_DB_PATH', 'databases/database.sqlite')),
            'prefix'   => '',
        ],

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'forge'),
            'username'  => env('DB_USERNAME', 'forge'),
            'password'  => env('DB_PASSWORD', ''),
            'unix_socket'  => env('DB_UNIX_SOCKET', ''),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],

        'mysql_multigaming' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST_MMG', 'localhost'),
            'database'  => env('DB_DATABASE_MMG', 'forge'),
            'username'  => env('DB_USERNAME_MMG', 'forge'),
            'password'  => env('DB_PASSWORD_MMG', ''),
            'unix_socket'  => env('DB_UNIX_SOCKET_MMG', ''),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
        ],

        'sqlsrv' => [
            'driver'   => 'sqlsrv',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'cluster' => false,

        'default' => [
            'host'     => '127.0.0.1',
            'port'     => 6379,
            'database' => 0,
        ],

    ],
=======
	/*
	|--------------------------------------------------------------------------
	| PDO Fetch Style
	|--------------------------------------------------------------------------
	|
	| By default, database results will be returned as instances of the PHP
	| stdClass object; however, you may desire to retrieve records in an
	| array format for simplicity. Here you can tweak the fetch style.
	|
	*/

	'fetch' => PDO::FETCH_CLASS,

	/*
	|--------------------------------------------------------------------------
	| Default Database Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the database connections below you wish
	| to use as your default connection for all database work. Of course
	| you may use many connections at once using the Database library.
	|
	*/

	'default' => env('CORE_DB_CONNECTION', 'mysql'),

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => [

		'sqlite' => [
			'driver'   => 'sqlite',
			'database' => env('CORE_DB_PATH', database_path('database.sqlite')),
			'prefix'   => '',
		],

		'testing' => [
			'driver'      => 'mysql',
			'host'        => env('CORE_DB_HOST', '127.0.0.1'),
			'database'    => env('CORE_DB_DATABASE', 'cvepdb_cms_testing'),
			'username'    => env('CORE_DB_USERNAME', 'cvepdb_testing'),
			'password'    => env('CORE_DB_PASSWORD', ''),
			'charset'     => 'utf8',
			'collation'   => 'utf8_unicode_ci',
			'prefix'      => '',
			'strict'      => false,
			'engine'      => null,
			'unix_socket' => env('CORE_DB_SOCKET', '/Applications/MAMP/tmp/mysql/mysql.sock'),
		],

		'codeship' => [
			'driver'      => 'mysql',
			'host'        => 'localhost',
			'database'    => 'test',
			'username'    => env('MYSQL_USER'),
			'password'    => env('MYSQL_PASSWORD'),
			'charset'     => 'utf8',
			'collation'   => 'utf8_unicode_ci',
			'prefix'      => '',
			'strict'      => false,
			'engine'      => null,
			'unix_socket' => '',
		],

		'mysql' => [
			'driver'                        => 'mysql',
			'host'                          => env('CORE_DB_HOST', '127.0.0.1'),
			'database'                      => env('CORE_DB_DATABASE', 'forge'),
			'username'                      => env('CORE_DB_USERNAME', 'forge'),
			'password'                      => env('CORE_DB_PASSWORD', ''),
			'charset'                       => 'utf8',
			'collation'                     => 'utf8_unicode_ci',
			'prefix'                        => '',
			'strict'                        => false,
			'engine'                        => null,
			'unix_socket'                   => env('CORE_DB_SOCKET', ''),
			// laravel-backups
			'dump_command_path'             => '/Applications/MAMP/Library/bin', // only the path, so without 'mysqldump' or 'pg_dump'
			'dump_command_timeout'          => 60 * 5, // 5 minute timeout
			'dump_using_single_transaction' => true, // perform dump using a single transaction
		],

		'pgsql' => [
			'driver'   => 'pgsql',
			'host'     => env('CORE_DB_HOST', '127.0.0.1'),
			'database' => env('CORE_DB_DATABASE', 'forge'),
			'username' => env('CORE_DB_USERNAME', 'forge'),
			'password' => env('CORE_DB_PASSWORD', ''),
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		],

		'sqlsrv' => [
			'driver'   => 'sqlsrv',
			'host'     => env('CORE_DB_HOST', '127.0.0.1'),
			'database' => env('CORE_DB_DATABASE', 'forge'),
			'username' => env('CORE_DB_USERNAME', 'forge'),
			'password' => env('CORE_DB_PASSWORD', ''),
			'charset'  => 'utf8',
			'prefix'   => '',
		],

	],

	/*
	|--------------------------------------------------------------------------
	| Migration Repository Table
	|--------------------------------------------------------------------------
	|
	| This table keeps track of all the migrations that have already run for
	| your application. Using this information, we can determine which of
	| the migrations on disk haven't actually been run in the database.
	|
	*/

	'migrations' => 'migrations',

	/*
	|--------------------------------------------------------------------------
	| Redis Databases
	|--------------------------------------------------------------------------
	|
	| Redis is an open source, fast, and advanced key-value store that also
	| provides a richer set of commands than a typical key-value systems
	| such as APC or Memcached. Laravel makes it easy to dig right in.
	|
	*/

	'redis' => [

		'cluster' => false,

		'default' => [
			'host'     => env('REDIS_HOST', 'localhost'),
			'password' => env('REDIS_PASSWORD', null),
			'port'     => env('REDIS_PORT', 6379),
			'database' => 0,
		],

	],
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406

];
