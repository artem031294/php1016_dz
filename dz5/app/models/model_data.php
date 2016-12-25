<?php

class Model_Data extends Model {

    public function get_data($name, $age, $photo, $info)
    {
        $data = array();
        $data['name'] = $name;
        $data['age'] = $age;
        $data['photo'] = $photo;
        $data['info'] = $info;

        return $data;
    }
}