<?php

namespace app\controllers;

use app\core\Controller;

/**
 * Description of ProductsController
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class ProductsController extends Controller
{
    public function indexAction(){
        $id = $_POST['category_id'];
        if(is_numeric($id)){ 
            $this->view->renderAjax(compact('id'));
        }
    }
}
