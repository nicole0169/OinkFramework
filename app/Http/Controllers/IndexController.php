<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 15:57
 */

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Oink\Bus\Events\BootstrapEvent;

class IndexController extends Controller
{
    public function hello(Request $request)
    {
        $name = $request->get('name');
        return new Response($this->twig->render('index/hello.html', ['name' => $name]));
    }
}