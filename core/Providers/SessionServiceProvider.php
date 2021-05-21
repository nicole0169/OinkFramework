<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-19
 * Time: 13:52
 */

namespace Oink\Providers;


use Oink\Session\SessionManager;
use Oink\Session\SessionStorage;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SessionServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // TODO: Implement register() method.
        $container['sessionStorage'] = function () {
            return new SessionStorage();
        };

        $container['sessionManager'] = function ($c) {
            return new SessionManager($c);
        };

        return $container;

    }
}