<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 14:46
 */

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('hello',new Route('/hello/{name}',array('_controller'=>'App\Http\Controllers\IndexController::hello')));
$collection->add('comment',new Route('/comment',array('_controller'=>'App\Http\Controllers\CommentController::index')));

return $collection;

