<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-19
 * Time: 14:12
 */

namespace Oink\Auth;


interface PasswordAuthProviderInterface extends AuthProviderInterface
{

    public function getUser();


    public function setUsername($username);


    public function setPassword($password);
}