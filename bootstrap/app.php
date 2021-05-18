<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 14:28
 */

use Oink\Application;

$container = new Pimple\Container();
foreach ($configApp['providers'] as $provider) {
    $container->register(new $provider());
}

$app = new Application($container);
return $app;