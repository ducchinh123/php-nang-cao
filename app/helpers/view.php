<?php

namespace App\Helpers;

class View
{

    public function view($page, $data = [], $errors = [])
    {
        extract($data);
        extract($errors);
        include_once './app/views/template/header.php';
        include_once './app/views/' . $page.".php";
        include_once './app/views/template/footer.php';
        
    }
}