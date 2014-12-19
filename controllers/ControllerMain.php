<?php
namespace controllers;

use core\Controller;
use core\View;
use models\ModelMain;
use models\ModelPost;

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
            $this->view = new View();
            $this->modelPost = new ModelPost;
        }
        
        /**
         * @load Main
        **/
        public function actionIndex() 
        {
            $this->settings['data'] = $this->model->getData();
            $this->settings['form'] = $this->modelPost->create();
            $this->settings['posts'] = $this->modelPost->output();
            $arr[] =  "MainView.php";
            $arr[] =  "PostView.php";
            $this->view->generate("TemplateView.php", $arr, $this->settings);
        }

    }


