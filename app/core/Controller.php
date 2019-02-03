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
    protected $route;
    protected $view;
    protected $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }
    
    protected function loadModel($name)
    {
        $path = 'app\models\\' . ucfirst($name);
        if(class_exists($path)){
            return new $path;
        }
    }
    
    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
    
}