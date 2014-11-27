<?php

class Controller_Main extends Controller
{
    function action_index() 
    {
        $data = $this->model->get_Data();
        $this->view->generate("main_view.php","template_view.php", $data);
    }
    
}


