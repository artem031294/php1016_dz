<?php
class Controller_Main extends Controller {

    public function action_index()
    {
//        $this->view->generate('main_view.php','template_view.php');
        $this->view->generate('base_view.twig',
            array(
                'title'=>'Главная страница',
                'content'=> "Это контент главной страницы"
            ));
    }

}