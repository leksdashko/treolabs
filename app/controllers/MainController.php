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
    /**
     * Index action for handle index page
     */
    public function indexAction()
    { 
        $this->view->render('index');
    }
    
}
