<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-20
 * Time: 10:20
 */

namespace Oink\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Medoo\Medoo;

class DatabaseServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // TODO: Implement register() method.
        $container['db'] = new Medoo([
            // required
            'database_type' => 'mysql',
            'database_name' => 'oink',
            'server' => 'localhost',
            'username' => 'root',
            'password' => '']);
        return $container;
    }
}