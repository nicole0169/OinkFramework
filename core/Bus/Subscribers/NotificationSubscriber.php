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

class NotificationSubscriber extends Base implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            'app.notify' => 'handleNotify'
        ];
    }

    public function execute(){
        echo 'Notification event done.';
    }

    public function handleNotify(){
        echo 'Notify handle done.';
    }
}