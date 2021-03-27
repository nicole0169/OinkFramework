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
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\Event;
use Oink\Bus\Subscribers\BootstrapSubscriber;
use Oink\Bus\Subscribers\NotificationSubscriber;

class EventServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // TODO: Implement register() method.
        $container['dispatcher'] = new EventDispatcher();
        $container['dispatcher']->addSubscriber(new BootstrapSubscriber($container));
        $container['dispatcher']->addSubscriber(new NotificationSubscriber($container));
        return $container;
    }
}