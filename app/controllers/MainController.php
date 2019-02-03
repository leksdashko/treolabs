<?php

namespace app\controllers;

use app\core\Controller;

/**
 * Controller for main page, category list
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class MainController extends Controller
{
    public function indexAction()
    { 
        $cats = $this->model->getCategories();
        $this->view->render('index', compact('cats'));
    }
    
}
