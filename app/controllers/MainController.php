<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

/**
 * Controller for main page, category list
 *
 * @author Alexander Dashko <leksdashko@gmail.com>
 */
class MainController extends Controller
{
    public function indexAction()
    {
        $db = new Db;
        $data = $db->row('SELECT categories_id FROM categories', []);
        print_pre($data);
        $this->view->render('index');
    }
    
}
