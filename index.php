<?php
ob_start();
ob_end_clean();
session_start();

use App\controllers\AuthController;
use App\controllers\HomeController;


require_once 'vendor/autoload.php';


define('URL_ROOT', 'http://localhost/devC/Php/php%20nang%20cao/autoload/');
$page = isset($_GET['page']) ? $_GET['page'] : '/';
$act = isset($_GET['act']) ? $_GET['act'] : 'index';

switch ($page) {

    case '/':

        if (!isset($_SESSION['is_login'])) {
            $auth = new AuthController;
            $auth->index();
        } else {
            return header('Location: ' . URL_ROOT . '?page=home');
        }
        break;

    case 'auth':
        if (!isset($_SESSION['is_login'])) {
            $auth = new AuthController;
            $auth->index();
            $auth->$act();
        } else {
            if ($act == 'logout') {
                $auth = new AuthController;
                $auth->logout();
            } else {
                return header('Location: ' . URL_ROOT . '?page=home');
            }
        }
        break;

    case 'home':
        $home = new HomeController;
        $home->index();
        break;

    case 'student':
        $home = new HomeController;
        // $act = isset($act) && !empty($act) ? $act : 'index';
        $id = isset($_GET['id']) ? $home->$act($_GET['id']) : $home->$act();

        break;

    default:
        $home = new HomeController();
        $home->index();
        break;
}
