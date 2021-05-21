<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-20
 * Time: 17:04
 */

namespace Oink\Exceptions;

use Exception;

class BaseException extends Exception
{
    protected $withoutLayout = false;

    /**
     * Get object instance.
     *
     * @static
     *
     * @param string $message
     *
     * @return static
     */
    public static function getInstance($message = '')
    {
        return new static($message);
    }

    /**
     * There is no layout.
     *
     * @return BaseException
     */
    public function withoutLayout()
    {
        $this->withoutLayout = true;

        return $this;
    }

    /**
     * Return true if no layout.
     *
     * @return bool
     */
    public function hasLayout()
    {
        return $this->withoutLayout;
    }
}