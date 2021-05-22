<?php

$db = require __DIR__.'/config/config.php';

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'development',
        'default_database'        => $db['db_driver'],
        'production' => [
            'adapter' => 'mysql',
            'host' => $db['db_connections']['mysql']['host'],
            'name' => $db['db_connections']['mysql']['database'],
            'user' => $db['db_connections']['mysql']['username'],
            'pass' => $db['db_connections']['mysql']['password'],
            'port' => $db['db_connections']['mysql']['port'],
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => $db['db_connections']['mysql']['host'],
            'name' => $db['db_connections']['mysql']['database'],
            'user' => $db['db_connections']['mysql']['username'],
            'pass' => $db['db_connections']['mysql']['password'],
            'port' => $db['db_connections']['mysql']['port'],
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => $db['db_connections']['mysql']['host'],
            'name' => $db['db_connections']['mysql']['database'],
            'user' => $db['db_connections']['mysql']['username'],
            'pass' => $db['db_connections']['mysql']['password'],
            'port' => $db['db_connections']['mysql']['port'],
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
