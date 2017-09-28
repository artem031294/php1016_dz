<?php
require_once 'init.php';

if (isset($_GET['id']) && !empty($_GET['id']))
{
    $id = (int) $_GET['id'];
    if(User::find($id)->delete())
    {
        echo "Пользователь с id=$id удален.";
        sleep(1);
    }

}