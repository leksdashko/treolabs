<?php

/**
 * The function for autoloading files with classes
 */
spl_autoload_register(function($class){
    $path = str_replace('\\', '/', $class . '.php');
    if(file_exists($path)){
        require $path;
    }
});

function print_pre($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
