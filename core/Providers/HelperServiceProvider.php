<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-20
 * Time: 10:20
 */

namespace Oink\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Oink\Helper;

class HelperServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // TODO: Implement register() method.
        $container['helper'] = new Helper($container);
        $container['helper']->register('app', '\Oink\Helpers\AppHelper');
        $container['helper']->register('url', '\Oink\Helpers\UrlHelper');
        return $container;
    }
}