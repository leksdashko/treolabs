<?php

namespace app\models;

use app\core\Model;

/**
 * 
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class Main extends Model{
    
    public function getCategories(){
        $data = $this->Db->row('SELECT categories_id FROM categories');
        return $data;
    }
    
}
