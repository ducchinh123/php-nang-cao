<?php

namespace App\Helpers;

class Data
{

    public function select_all($result)
    {
        $data = [];
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function select_one($result)
    {
        $row = '';
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        return $row;
    }


}