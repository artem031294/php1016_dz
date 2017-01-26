<?php

class Controller_Dash extends Controller {

    function __construct()
    {
        $this->model = new Model_Dash();
        $this->view = new View();
    }

    function action_index() {
        $this->view->generate("dash_view.php", "template_view.php", $this->model->get_data());
    }

    function action_upload() {
        $allowed =  array('gif','png' ,'jpg', 'jpeg');
        if(isset($_FILES['photo']) && !empty($_POST)) {
            $nameCheck = '/[^a-z0-9]+/u';
            if (!preg_match($nameCheck, $_FILES['photo']['name'])) {
                die('Имя файла должно содержать только латинские символы.');
            }
            if(empty($_SESSION)) session_start();
            $user = $_SESSION['login'];

            //$this->view->generate("dash_view.php", "template_view.php");

            $filename = $_FILES['photo']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!in_array(strtolower($ext),$allowed) ) {
                echo 'Запрещенный тип файлов.';
                header( "refresh:1.5;url=/dash/");
            } else {
                $upload_dir = './photos/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777);
                }
                $upload_file = $upload_dir . basename($filename);

                $blob = fopen($upload_file, 'r');

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_file)) {
                    $this->model->file_upload($upload_file, $blob, $user);
                    echo 'Файл загружен';
                    header( "refresh:1.5;url=/dash/");
                } else {
                    echo "ALARM!!\n Ограничение 3МБ";
                    header( "refresh:1.5;url=/dash/");
                }
            }
        }
    }

    function action_allInfo() {
        if (empty($_SESSION)) session_start();
        $owner = strip_tags($_SESSION['login']);
        $data = array();

        $query1 = 'SELECT path, owner FROM photos WHERE owner="' . $owner .'"';
        $query2 = 'SELECT age, login FROM users';
        $data['file'] = $this->model->get_allInfo($query1);
        $data['users'] = $this->model->get_allInfo($query2);

        $routes = explode('/', $_SERVER['DOCUMENT_ROOT']);
        array_shift($routes);
        array_shift($routes);
        array_shift($routes);
        $routes = implode('/', $routes);
        $data['route'] = $routes;
        $data['user'] = $_SESSION['login'];

        $this->view->generate("allInfo_view.php", "template_view.php", $data);
    }

    function action_changeInfo() {
        if(empty($_SESSION)) session_start();
        $owner = $_SESSION['login'];

        if(isset($_POST['age']) && isset($_POST['about']) && !empty($_POST['age'])) {
            $age = htmlentities($_POST['age']);
            $about = htmlentities($_POST['about']);
            $query = 'UPDATE users SET age="' . $age . '", about="' . $about . '" WHERE login="' . $owner . '"';
            $this->model->change_info($query);
            header("refresh:1.5;url=/dash/");
        }

        return false;
    }
}