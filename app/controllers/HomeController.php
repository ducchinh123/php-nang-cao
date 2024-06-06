<?php

namespace App\controllers;

use App\Helpers\View;
use App\config\Database;
use App\Helpers\Data;
use App\Models\User;

class HomeController
{

    public $UserModel;
    public $view;

    public function __construct()
    {
        $this->UserModel = new User();
        $this->view = new View;
    }
    public function index($limit = 1, $offset = 1)
    {

        $limit = isset($_GET['limit']) ? $_GET['limit'] : 1;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        $data = $this->UserModel->get_all_student($limit, $offset);
        return $this->view->view('home/index', $data);
    }

    public function add($datas = [])
    {

        $view = new View;
        return $view->view('home/add', $datas);
    }

    public function startAdd()
    {

        if (isset($_POST['addBtn'])) {
            $errors = [];
            $data = [];

            if (empty($_POST['name'])) {
                $errors['name'] = 'Không được bỏ trống name';
            } else {
                $data['name'] = $_POST['name'];
            }
            if (empty($_POST['birthday'])) {
                $errors['birthday'] = 'Không được bỏ trống birthday';
            } else {
                $data['birthday'] = $_POST['birthday'];
            }

            if (empty($_POST['gender'])) {
                $errors['gender'] = 'Không được bỏ trống gender';
            } else {
                $data['gender'] = $_POST['gender'];
            }

            if (!empty($errors)) {
                $data['ers'] = $errors;
                return $this->add($data);
            }

            $add = $this->UserModel->addStudent($data);
            if ($add) {
                $success['success'] = 'Thêm mới hs thành công';
                return $this->add($success);
            }

        }

        return $this->add();
    }

    public function delete($id)
    {
        $id = (int) $_GET['id'];
        $this->UserModel->deleteStudent($id);
        return header('Location: ' . URL_ROOT.'?page=home');
    }

    public function update($id)
    {
        $id = (int) $id;
        $data = $this->UserModel->get_one($id);
        return $this->view->view('home/update', $data);
    }


    public function updateStart($id)
    {
        $id = (int) $id;
        $user = $this->UserModel->get_one($id);


        if (isset($_POST['addBtn'])) {
            $errors = [];
            $data = [];

            if (empty($_POST['name'])) {
                $errors['er-name'] = 'Không được bỏ trống name';
            } else {
                $data['name'] = $_POST['name'];
            }
            if (empty($_POST['birthday'])) {
                $errors['er-birthday'] = 'Không được bỏ trống birthday';
            } else {
                $data['birthday'] = $_POST['birthday'];
            }

            if (empty($_POST['gender'])) {
                $errors['er-gender'] = 'Không được bỏ trống gender';
            } else {
                $data['gender'] = $_POST['gender'];
            }

            if (!empty($errors)) {
                $data['ers'] = $errors;
                return $this->view->view('home/update', $user, $data);
            }

            $update = $this->UserModel->updateStudent($id, $data);
            if ($update) {
                $success['success'] = 'Cập nhật hs thành công';
                return header('Location: ' . URL_ROOT . "?page=student&act=update&id=" . $id);
            }

        }

        return $this->view->view('home/update', $user);

    }


    public function searchStudent()
    {
        $name = $_POST['name'];
        $result = $this->UserModel->searchStudent($name);
        $data = $result;
        echo json_encode($data);
    }
}