<?php
namespace controllers;

use core\Controller;
use core\View;
use models\ModelMain;

    class ControllerMain extends Controller
    {

        public function __construct()
        {
            $this->view = new View;
            $this->model = new ModelMain;
        } 

        public function action_index() 
        {
            $data = $this->model->get_Data();
            $this->view->generate("MainView.php","TemplateView.php", $data);
        }

    }


