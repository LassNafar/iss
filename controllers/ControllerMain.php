<?php
namespace controllers;

use core\Controller;
use core\View;
use models\ModelMain;

    class ControllerMain extends Controller
    {
        public $settings;
        /**
         * @create view
         * @create model
        **/
        public function __construct()
        {
            $this->model = new ModelMain;
            $this->view = new View($this->model->Auth());
        }
        
        /**
         * @load Main
        **/
        public function actionIndex() 
        {
            echo View::createUrl("/happy");
            $this->settings['data'] = $this->model->getData();
            $this->view->generate("MainView.php","TemplateView.php",  $this->settings);
        }

    }


