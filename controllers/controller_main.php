<?php

class Controller_Main extends Controller
{
    
    public function __construct()
    {
        $this->view = new View;
        $this->model = new Model_Main;
    } 
    
    public function action_index() 
    {
        $data = $this->model->get_Data();
        $this->view->generate("main_view.php","template_view.php", $data);
    }

}


