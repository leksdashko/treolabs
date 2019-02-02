<?php

namespace app\core;
use app\core\View;

/**
 * Abstract controller, main controller for handle http requests
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
abstract class Controller
{
    protected $routes;
    protected $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }
    
    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
    
}