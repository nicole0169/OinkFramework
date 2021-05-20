<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-19
 * Time: 16:13
 */

namespace Oink;

use Pimple\Container;

class Tools
{
    /**
     * Build dependency injection container from an array.
     *
     * @static
     *
     * @param Container $container
     * @param array $namespaces
     *
     * @return Container
     */
    public static function buildDIC(Container $container, array $namespaces)
    {
        foreach ($namespaces as $namespace => $classes) {
            foreach ($classes as $name) {
                $class = '\\Oink\\' . $namespace . '\\' . $name;
                $container[lcfirst($name)] = function ($c) use ($class) {
                    return new $class($c);
                };
            }
        }
        return $container;
    }
}