<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-24
 * Time: 10:55
 */

namespace Oink\Bus\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BootstrapSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            'app.bootstrap' => [['executepre',10],['execute',9]],
        ];
    }

    public function executepre(){
        echo 'Bootstrap event pre done.';
    }

    public function execute(){
        echo 'Bootstrap event done.';
    }


}