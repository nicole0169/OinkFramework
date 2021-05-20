<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-19
 * Time: 14:00
 */

namespace Oink\Auth;


interface AuthProviderInterface
{

    public function getName();


    public function authenticate();
}