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

    public function get_all_student()
    {
        $result = $this->db->connect()->query("SELECT * FROM `students`");
        $data['users'] = $this->selectData->select_all($result);
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
}