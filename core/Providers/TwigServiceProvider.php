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
use Oink\Template;

class TwigServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // TODO: Implement register() method.
        $template = new Template('twig');
        $container['twig'] = $template;
        return $container;
    }
}