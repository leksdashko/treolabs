<?php

namespace app\core;

use app\lib\Db;

/**
 * 
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
abstract class Model
{
    
    protected $Db;
    
    public function __construct()
    {
        $this->Db = new Db();
    }
    
}