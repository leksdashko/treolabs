<?php

namespace app\models;

use app\core\Model;

/**
 * Select category products
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class Category extends Model{
     
    private $id;
    
    public function setId($id){
        if(is_numeric($id)){ 
            $this->id = $id;
        }
    }
    
    public function getProducts(){
        $products = $this->Db->row('
                SELECT pc.products_id as prodid, p.* FROM products_to_categories as pc 
                INNER JOIN products as p 
                ON pc.products_id = p.products_id
                WHERE pc.categories_id = :categories_id
        ', ['categories_id' => $this->id]);
        return $products;
    }
    
}
