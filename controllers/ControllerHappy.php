<?php
namespace controllers;

use core\Controller;
use core\View;
use models\ModelHappy;

    class ControllerHappy extends Controller
    {
        /**
         * @create view
         * @create model
        **/
        public function __construct()
        {
            $this->view = new View;
            $this->model = new ModelHappy;
        } 

        /**
         * @load Main
        **/
        public function action_index ()
        {
            $data = $this->model->get_Data();
            $this->view->generate("MainView.php","TemplateView.php", $data);
        }
    }


