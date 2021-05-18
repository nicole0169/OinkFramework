<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-24
 * Time: 10:55
 */

namespace Oink\Bus\Subscribers;

use Oink\Base;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class BootstrapSubscriber extends Base implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            'app.bootstrap' => [['executepre',10],['execute',9]],
        ];
    }

    public function executepre(GenericEvent $event){
        echo 'Bootstrap event pre done.';
        //$event->doBootstrap();
    }

    public function execute(GenericEvent $event){
        echo 'Bootstrap event done.';
    }


}