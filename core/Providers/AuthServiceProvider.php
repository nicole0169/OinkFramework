<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-19
 * Time: 13:52
 */

namespace Oink\Providers;


use Oink\Auth\AuthManager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AuthServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // TODO: Implement register() method.
        $container['authManager'] = new AuthManager($container);

        return $container;

    }
}