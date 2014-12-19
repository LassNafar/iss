<?php
namespace controllers;

use core\Controller;
use core\View;
use models\ModelRegistry;

    class ControllerRegistry extends Controller
    {
        public $settings;
        
        /**
         * @create view
         * @create model
        **/
        public function __construct()
        {
            $this->model = new ModelRegistry;
            $this->view = new View();
        } 

        /**
         * @load Main
        **/
        public function actionIndex ()
        {
           $this->settings['form'] = $this->model->create();
           $this->settings['data'] = $this->model->getData();
           $this->view->generate("TemplateView.php", "RegistryView.php", $this->settings);
        }
    }