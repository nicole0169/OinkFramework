<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 13:43
 */

return [
    'providers' => [
        Oink\Providers\DatabaseServiceProvider::class,
        Oink\Providers\TemplateServiceProvider::class,
        Oink\Providers\TwigServiceProvider::class,
        Oink\Providers\EventServiceProvider::class,
        Oink\Providers\HelperServiceProvider::class
    ],
];