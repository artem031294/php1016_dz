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
        print_r($_POST);
        $allowed =  array('gif','png' ,'jpg', 'jpeg');
        if(isset($_POST['photo']) && !empty($_POST['photo'])) {
            //$this->view->generate("dash_view.php", "template_view.php", $_POST);
            /*
            $filename = $_FILES['photo']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!in_array(strtolower($ext),$allowed) ) {
                echo 'Запрещенный тип файлов.';
                header( "refresh:1.5;url=dash" );
            } else {
                $upload_dir = './photos/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777);
                }
                $upload_file = $upload_dir . basename($filename);

                $blob = fopen($upload_file, 'r');
                $user = $_SESSION['login'];

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_file)) {
                    $query = "INSERT INTO files (path, data, owner) VALUES ('$upload_file' , '$blob' , '$user')";
                    Model_Db::getInstance()->querySql($query, true);
                } else {
                    echo "ALARM!!\n Ограничение 3МБ";
                }
            }
            */
        }
    }
}