<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 16:45
 */

namespace Oink;

use Pimple\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

class Application
{
    protected $container;
    protected $request;
    protected $matcher;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function handle(Request $request)
    {
        $this->request = $request;
        $this->matcher = $this->getRouteMap();

        try {
            $this->setRequestRoute($this->request, $this->matcher);

            //$controller = (new ControllerResolver())->getController($request);
            //$arguments = (new ArgumentResolver())->getArguments($request, $controller);
            //return call_user_func_array($controller, $arguments);

            $controller = (new ControllerResolver())->getController($request);
            if (method_exists($controller[0], 'setContainer')) {
                $controller[0]->setContainer($this->container);
            }
            return $controller[0]->{$controller[1]}($request);
        } catch (ResourceNotFoundException $e) {
            return new Response('Not found.', 404);
        }
    }

    protected function setRequestRoute(Request &$request, UrlMatcher $matcher)
    {
        $request->attributes->add($matcher->match($request->getPathInfo()));
    }

    protected function getRouteMap()
    {
        return new UrlMatcher($this->getRouteCollection(), (new RequestContext())->fromRequest($this->request));

    }

    protected function getRouteCollection()
    {
        return require __DIR__ . '/../routes/base.php';
    }
}