<?php
class Controller_Contact extends Controller {

    public function action_index()
    {
//        $this->view->generate('contact_view.php','template_view.php');
        $this->view->generate('base_view.twig',
            array(
                'title'=>'Контакты',
                'content'=> "Это контент контактов"
            ));
    }

}