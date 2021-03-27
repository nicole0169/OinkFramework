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
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TemplateServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // TODO: Implement register() method.
        $loader = new FilesystemLoader(__DIR__ . '/../../app/Resources/views');
        $twig = new Environment($loader);
        $container['template'] = $twig;
        return $container;
    }
}