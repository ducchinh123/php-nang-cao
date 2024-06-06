<?php

ob_start();
ob_end_clean();

require_once 'vendor/autoload.php';

use App\controllers\HomeController;

define('URL_ROOT', 'http://localhost/devC/Php/php%20nang%20cao/autoload/');
$page = isset($_GET['page']) ? $_GET['page'] : '/';
$act = isset($_GET['act']) ? $_GET['act'] : '';
switch ($page) {
    case '/':
        $home = new HomeController;
        $home->index();
        break;

    case 'student':
        $home = new HomeController;
        $act = isset($act) && !empty($act) ? $act : 'index';
        $id = isset($_GET['id']) ? $home->$act($_GET['id']) : $home->$act();

        break;

    default:
        $home = new HomeController();
        $home->index();
        break;
}
