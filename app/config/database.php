<?php

namespace App\config;

use mysqli;

class Database
{

    public $hostname, $username, $password, $dbname;
    public function connect($hostname = "localhost", $username = "root", $password = "", $dbname = "school")
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $connect = new mysqli($hostname, $username, $password, $dbname);

        if ($connect->connect_error) {
            die("Lỗi kết nối CSD: " . $connect->connect_error);
        }
        return $connect;

    }
}
