<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-22
 * Time: 14:05
 */

namespace Oink;

use Pimple\Container;

/**
 * Class Base
 * @package Oink
 *
 * User: minmiao
 * Date: 2021-03-22
 */
abstract class Base
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * Base constructor.
     * @param Container $container
     */
    public function __construct()
    {

    }

    public function setContainer(Container $container){
        $this->container = $container;
    }

    /**
     * __get
     *
     * @param $name
     * @return mixed
     *
     * Author: minmiao
     * Date: 2021-03-22 14:09
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->container[$name];
    }

    /**
     * getInstance
     *
     * @param Container $container
     * @return Base
     *
     * Author: minmiao
     * Date: 2021-03-22 14:09
     */
    public static function getInstance(Container $container)
    {
        return new static($container);
    }
}