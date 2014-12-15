<?php
namespace controllers;

use core\Controller;
use core\View;
use models\ModelHappy;

    class ControllerHappyend extends Controller
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
           $this->settings['data'] = "Happyend";
           $this->view->generate("MainView.php","TemplateView.php", $this->settings, $this->model);
        }
    }