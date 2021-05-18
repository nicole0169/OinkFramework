<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 13:13
 */

// Register The Auto Loader.
require __DIR__ . '/../bootstrap/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

try {
    $app->execute();
} catch (Exception $e) {
    echo $e->getMessage();
}