<?php
class Controller_Portfolio extends Controller {

    function __construct()
    {
        $this->model  =  new Model_Portfolio();
        $this->view = new View();
    }

    public function action_index()
    {
        $data = $this->model->get_data();
//        $this->view->generate('portfolio_view.php','template_view.php', $data);
        $this->view->generate('portfolio_view.twig',
            array(
                'title'=>'Портфолио',
                'data'=> $data
            ));
    }

}