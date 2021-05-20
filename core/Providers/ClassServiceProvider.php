<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-19
 * Time: 13:52
 */

namespace Oink\Providers;


use Oink\Auth\AuthManager;
use Oink\Tools;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ClassServiceProvider implements ServiceProviderInterface
{
    private $classes = [
        'Identity' => [
            'UserSession'
        ]
    ];

    public function register(Container $container)
    {
        // TODO: Implement register() method.
        Tools::buildDIC($container, $this->classes);

        return $container;
    }
}