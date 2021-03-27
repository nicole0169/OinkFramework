<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 13:17
 */

require __DIR__.'/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$config = require __DIR__.'/../config/config.php';
$configApp = require __DIR__.'/../config/app.php';

require __DIR__.'/bootstrap.php';