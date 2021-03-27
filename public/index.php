<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 13:13
 */

require __DIR__ . '/../bootstrap/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Oink\Application;
use Pimple\Container;

$request = Request::createFromGlobals();

$container = new Container();

foreach ($configApp['providers'] as $provider) {
    $container->register(new $provider());
}

$app = new Application($container);
$response = $app->handle($request);
$response->send();