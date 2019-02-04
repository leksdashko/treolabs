<?php

namespace app\core;

use app\lib\Db;

/**
 * Abstract class model, for handle requests for views
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