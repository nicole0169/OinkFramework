<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-19
 * Time: 16:05
 */

namespace Oink\Identity;


use Oink\Base;

class UserSession extends Base
{
    public function isLogged()
    {
        return isset($this->sessionStorage->user) && !empty($this->sessionStorage->user);

    }
}