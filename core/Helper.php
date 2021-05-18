<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-07
 * Time: 15:47
 */

namespace Oink;


use Pimple\Container;

class Helper
{
    private $helpers;

    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->helpers = new Container();
    }

    public function __get($helper)
    {
        // TODO: Implement __get() method.
        return $this->getHelper($helper);
    }

    public function getHelper($helper)
    {
        return $this->helpers[$helper];
    }

    public function register($property, $className)
    {
        $container = $this->container;

        $this->helpers[$property] = function () use ($className, $container) {
            return new $className($container);
        };

        return $this;
    }
}