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

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name');
        return new Response($this->twig->render('comment/index.html', ['name' => $name]));
    }
}