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
            $this->view = new View;
            $this->model = new ModelMain;
        }
        
        /**
         * @load Main
        **/
        public function actionIndex() 
        {
            $this->settings['data'] = $this->model->getData();
            $this->view->generate("MainView.php","TemplateView.php",  $this->settings);
        }

    }


