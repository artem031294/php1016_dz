<?php

class Model_Dash extends Model
{
    public function get_data()
    {
        if (Model_Db::getInstance())
        {
            session_start();

            if(isset($_SESSION['id'])) {
                $user_id = $_SESSION['id'];
                $query = "SELECT name, about, photo,age FROM users WHERE id = $user_id";
                return Model_Db::getInstance()->querySql($query);
            } else {
                return 'Нет ID';
            }
        } else {
            return "Ошибка связи с БД";
        }
    }

    public function file_upload($file, $data, $user)
    {
        $query = "INSERT INTO photos (path, data, owner) VALUES ('$file' , '$data' , '$user')";
        Model_Db::getInstance()->querySql($query, true);
        return true;
    }

    public function get_allInfo($q) {
        return Model_Db::getInstance()->querySql($q);
    }
}