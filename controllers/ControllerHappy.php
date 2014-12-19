<?php
namespace controllers;

use core\Controller;
use core\View;
use models\ModelHappy;
use models\ModelDb;

    class ControllerHappy extends Controller
    {
        public $settings;
        
        /**
         * @create view
         * @create model
        **/
        public function __construct()
        {
            $this->model = new ModelHappy;
            $this->view = new View();
        } 

        /**
         * @load Main
        **/
        public function actionIndex ()
        {
           $this->settings['form'] = $this->model->create();
           $this->settings['data'] = $this->model->getData();
           $this->view->generate("TemplateView.php", "MainView.php", $this->settings);
        }
    }


