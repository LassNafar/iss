<?php

class Controller_Happy extends Controller
{
    public function __construct()
    {
        $this->view = new View;
        $this->model = new Model_Happy;
    } 
    
    public function action_index ()
    {
        $data = $this->model->get_Data();
        $this->view->generate("main_view.php","template_view.php", $data);
    }
}

