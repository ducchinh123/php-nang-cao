<?php

namespace App\Models;

use App\config\Database;
use App\Helpers\Data;

class Auth
{

    public $db;
    public $selectData;
    public function __construct()
    {
        $this->db = new Database();
        $this->selectData = new Data;
    }



    public function check_auth($name, $email)
    {
        $result = $this->db->connect()->query("SELECT * FROM students WHERE email = '$email'AND name = '$name'");
        $row = $this->selectData->select_one($result);

        if (!empty($row)) {
            return true;
        }
        return false;
    }
}