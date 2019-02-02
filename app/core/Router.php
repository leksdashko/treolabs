<?php

namespace app\core;
use app\core\View;

/**
 *  Class for handle site routes
 * 
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class Router
{
    private $routes = [];
    private $params = [];
    
    public function __construct() 
    {
        $routes = require 'app/config/routes.php';
        foreach ($routes as $route => $params){
            $this->add($route, $params);
        }
    }
    
    /**
     * Add route
     * 
     * @param string $route
     * @param type $params
     */
    private function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }
    
    /**
     * Route verification
     * 
     * @return boolean
     */
    private function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    
    /**
     * Determine the controller and action for page
     */
    public function run()
    {
        if($this->match()){
            $path = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if(class_exists($path)){
                $action = $this->params['action']  . 'Action';
                if(method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                }else{
                    View::errorCode(404);
                }
            }else{
                View::errorCode(404);
            }
        }else{
            View::errorCode(404);
        }
    }
    
}