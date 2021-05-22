<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 13:49
 */

// Oink directory
define('OINK_DIR', __DIR__.DIRECTORY_SEPARATOR.'..');

// Data directory (must be writeable by the web server user)
define('DATA_DIR', OINK_DIR.DIRECTORY_SEPARATOR.'storage');

// Log filename if the log driver is "file"
define('LOG_DIR', DATA_DIR.DIRECTORY_SEPARATOR.'log');

// Cache directory to use if cache driver is "file" (must be writeable by the web server user)
define('CACHE_DIR', DATA_DIR.DIRECTORY_SEPARATOR.'cache');

// Folder for uploaded files (must be writeable by the web server user)
define('FILES_DIR', DATA_DIR.DIRECTORY_SEPARATOR.'files');

// Database driver: sqlite, mysql or pgsql (sqlite by default)
define('DB_DRIVER', $config['db_driver']);

if (DB_DRIVER !== 'sqlite') {
    // Mysql/Postgres username
    define('DB_USERNAME', $config['db_connections'][$config['db_driver']]['username']);

    // Mysql/Postgres password
    define('DB_PASSWORD', $config['db_connections'][$config['db_driver']]['password']);

    // Mysql/Postgres hostname
    define('DB_HOSTNAME', $config['db_connections'][$config['db_driver']]['host']);

    // Mysql/Postgres database name
    define('DB_NAME', $config['db_connections'][$config['db_driver']]['database']);

    // Mysql/Postgres custom port (null = default port)
    define('DB_PORT', $config['db_connections'][$config['db_driver']]['port']);
} else {
    // Sqlite configuration
    define('DB_FILENAME', DATA_DIR.DIRECTORY_SEPARATOR.$config['db_connections'][$config['db_driver']]['database'].'.sqlite');
}

// Mysql SSL key
define('DB_SSL_KEY', null);

// Mysql SSL certificate
define('DB_SSL_CERT', null);

// Mysql SSL CA
define('DB_SSL_CA', null);

// Database backend group provider
define('DB_GROUP_PROVIDER', true);