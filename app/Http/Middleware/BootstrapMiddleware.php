<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-18
 * Time: 13:58
 */

namespace App\Http\Middleware;

use Oink\Middleware\BaseMiddleware;
use Oink\Bus\Events\BootstrapEvent;

class BootstrapMiddleware extends BaseMiddleware
{
    public function execute()
    {
        //
        //$this->dispatcher->dispatch(new BootstrapEvent(), 'app.bootstrap');
        $this->next();
    }
}