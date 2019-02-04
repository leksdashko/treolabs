<?php

namespace app\controllers;

use app\core\Controller;

/**
 * Description of CategoryController
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class CategoryController extends Controller
{
    public function indexAction()
    {
        $id = $_POST['id'];
        $this->model->setId($id);
        $products = $this->model->getProducts();
        $this->view->renderAjax(compact('products'));
    }
}
