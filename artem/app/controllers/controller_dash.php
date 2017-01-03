<?php

class Controller_Dash extends Controller {

    function __construct()
    {
        $this->model = new Model_Dash();
        $this->view = new View();
    }

    function action_index() {
        $this->view->generate("dash_view.php", "template_view.php",$this->model->get_data());
    }
}