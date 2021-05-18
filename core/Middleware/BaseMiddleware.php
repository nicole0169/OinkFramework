<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-18
 * Time: 13:48
 */

namespace Oink\Middleware;

use Oink\Base;

abstract class BaseMiddleware extends Base
{
    protected $nextMiddleware = null;

    abstract public function execute();

    public function setNextMiddleware(self $nextMiddleware)
    {
        $this->nextMiddleware = $nextMiddleware;
    }

    public function getNextMiddleware()
    {
        return $this->nextMiddleware;
    }

    /**
     * Move to next middleware.
     */
    public function next()
    {
        if ($this->nextMiddleware !== null) {
            $this->nextMiddleware->execute();
        }
    }


}