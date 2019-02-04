<?php

use app\core\Router;

require_once 'functions.php';

session_start();

(new Router())->run();