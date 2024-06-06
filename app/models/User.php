<?php

namespace App\Models;

use App\config\Database;
use App\Helpers\Data;

class User
{

    public $db;
    public $selectData;
    public function __construct()
    {
        $this->db = new Database();
        $this->selectData = new Data;
    }

    public function get_all_student($limit = 1, $offset = 0)
    {
        
        $result = $this->db->connect()->query("SELECT * FROM `students` LIMIT {$limit} OFFSET {$offset}");
        $data['users'] = $this->selectData->select_all($result);
        $pagi= $this->db->connect()->query("SELECT count(student_id) as total FROM `students` WHERE 1");
        $total = ($pagi->fetch_assoc())['total'];
        $data['paginate'] = ceil($total/$limit);
        return $data;
    }

    public function addStudent($data)
    {
        $name = $data['name'];
        $birthday = $data['birthday'];
        $gender = $data['gender'];
        $result = $this->db->connect()->query(
            "INSERT INTO students(name,birthday,gender) VALUES('$name', '$birthday', '$gender')"
        );
        $this->db->connect()->close();

        return $result;
    }

    public function deleteStudent($id)
    {
        return $this->db->connect()->query("DELETE FROM `students` WHERE `students`.`student_id` = {$id}");
    }

    public function get_one($id)
    {
        $result = $this->db->connect()->query("SELECT * FROM `students` WHERE `students`.`student_id` = {$id}");
        return $this->selectData->select_one($result);
    }

    public function updateStudent($id, $data)
    {
        $name = $data['name'];
        $birthday = $data['birthday'];
        $gender = $data['gender'];
        $result = $this->db->connect()->query(
            "UPDATE `students` set `students`.`name` = '$name', `students`.`birthday` = '$birthday', `students`.`gender` = '$gender' WHERE student_id = {$id}"
        );
        $this->db->connect()->close();

        return $result;
    }

    public function searchStudent($name) {
        $result = $this->db->connect()->query("SELECT * FROM `students` WHERE `students`.`name` like '%$name%'");
        $data = $this->selectData->select_all($result);
        return $data;
    }
}