<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-20
 * Time: 10:20
 */

namespace Oink\Providers;

use Oink\Exceptions\LogicException;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Medoo\Medoo;

class DatabaseServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        // TODO: Implement register() method.
        $container['db'] = $this->getInstance();

        return $container;
    }

    private function getInstance()
    {
        switch (DB_DRIVER) {
            case 'sqlite':
                $db = $this->getSqliteInstance();
                break;
            case 'mysql':
                $db = $this->getMysqlInstance();
                break;
            case 'pgsql':
                $db = $this->getPostgresInstance();
                break;
            default:
                throw new LogicException('Database driver not supported');
        }
        return $db;
    }

    private function getSqliteInstance()
    {
        return new Medoo([
            // required
            'type' => 'sqlite',
            'database' => DB_FILENAME
            ]);
    }

    private function getMysqlInstance()
    {
        return new Medoo([
            // required
            'database_type' => 'mysql',
            'database_name' => DB_NAME,
            'server' => DB_HOSTNAME,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD]);

    }

    private function getPostgresInstance()
    {
        return new Medoo([
            // required
            'type' => 'pgsql',
            'database' => DB_NAME,
            'server' => DB_HOSTNAME,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD]);

    }

}