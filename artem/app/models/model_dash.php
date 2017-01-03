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
}