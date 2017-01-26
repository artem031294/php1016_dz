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
        if(empty($_SESSION)) session_start();
        $query = "INSERT INTO photos (path, data, owner) VALUES ('$file' , '$data' , '$user')";
        $query1 = "UPDATE users SET photo='" . $file . "' WHERE login='" . $_SESSION['login'] . "'";
        Model_Db::getInstance()->querySql($query, true);
        Model_Db::getInstance()->querySql($query1, true);
        return true;
    }

    public function get_allInfo($q) {
        return Model_Db::getInstance()->querySql($q);
    }

    public function change_info($q) {
        return Model_Db::getInstance()->querySql($q, true);
    }
}