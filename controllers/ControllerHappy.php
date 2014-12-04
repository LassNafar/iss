<?php
namespace controllers;

use core\Controller;
use core\View;
use models\ModelHappy;

    class ControllerHappy extends Controller
    {
        public $settings;
        
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
        public function actionIndex ()
        {
           $this->settings['data'] = $this->model->getData();
           $this->view->generate("MainView.php","TemplateView.php", $this->settings);
        }
    }


