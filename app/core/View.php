<?php

namespace app\core;

/**
 * Rendering our view templates
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class View
{
    protected $path;
    protected $route;
    protected $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }
    
    /**
     * Require suitable view template
     * 
     * @param type $title
     * @param type $vars
     */
    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'app/views/' . $this->path . '.php';
        if(file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/views/layouts/' . $this->layout . '.php';
        }else{
            echo 'View not found';
        }
    }
    
    /**
     * Require suitable view template, by ajax
     * 
     * @param type $title
     * @param type $vars
     */
    public function renderAjax($vars = [])
    {
        $path = 'app/views/' . $this->path . '.php';
        if(file_exists($path)){
            ob_start();
            extract($vars);
            ob_get_clean();
            require $path;
        }else{
            echo 'View not found';
        }
    }

    /**
     * Require error template
     * 
     * @param type $code
     */
    public static function errorCode($code)
    {
        http_response_code($code);
        require 'app/views/errors/' . $code . '.php';
        exit;
    }
    
}