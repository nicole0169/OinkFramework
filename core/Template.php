<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-03-18
 * Time: 16:45
 */

namespace Oink;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Template
{

    protected $instance;

    public function __construct($template_engine)
    {
        switch ($template_engine) {
            case 'twig':
                $loader = new FilesystemLoader(__DIR__ . '/../app/Resources/views');
                $twig = new Environment($loader);
                $this->instance = $twig;
                break;

            default:
                $loader = new FilesystemLoader(__DIR__ . '/../app/Resources/views');
                $twig = new Environment($loader);
                $this->instance = $twig;

        }
    }

    public function render($template, $context = [])
    {
        return $this->instance->render($template, $context);
    }
}