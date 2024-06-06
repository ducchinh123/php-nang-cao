<?php

namespace App\controllers;

use App\Models\Auth;
use App\Helpers\View;

class AuthController
{

    public $view;
    public $AuthModel;
    public function __construct()
    {
        $this->view = new View;
        $this->AuthModel = new Auth;
    }

    public function index()
    {
        return $this->view->view('auth/index');
    }

    public function login()
    {

        if (isset($_POST['btn-login'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            if ($this->AuthModel->check_auth($name, $email)) {

                $data = [
                    'name' => $name,
                    'email' => $email
                ];
                $_SESSION['is_login'] = true;
                $_SESSION['user_info'] = $data;

                header('Location: ' . URL_ROOT . "?page=home");

            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['is_login'])) {

            unset($_SESSION['is_login']);
            unset($_SESSION['user_info']);

            return header('Location: ' . URL_ROOT . "?page=auth");
        }
    }
}