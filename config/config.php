<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 13:43
 */

return [
    // Enable/Disable debug
    'debug' => env('APP_DEBUG', false),

    // Available log drivers: syslog, stderr, stdout or file
    'log_driver' => env('APP_LOG', 'file'),

    // Available cache drivers are "file", "memory" and "memcached"
    'cache_driver' => 'memory',

    // Hide login form, useful if all your users use Google/Github/ReverseProxy authentication
    'hide_login_form' => false,

    // Enable/disable url rewrite
    'enable_url_rewrite' => true,

    // Available db drivers are "mysql", "sqlite" and "postgres"
    'db_driver' => env('DB_CONNECTION', 'mysql'),

    'db_connections' => [
        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => 'oink',
        ],

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'oink'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD', ''),
            'port'      => env('DB_PORT', '3306'),
            'charset'   => 'utf8',
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'oink'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'port'     => '5432',
            'charset'  => 'utf8',
        ],
    ],
];