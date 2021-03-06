<?php

namespace controllers;

use core\Controller;
use core\View;

    class Controller404 extends Controller
    {
        /**
         * @create view
        **/
        public function __construct()
        {
            $this->view = new View;
        }
        
        /**
         * @load 404
        **/
        public function actionIndex ()
        {
            $data = "404 NOT FOUND";
            $this->view->generate("TemplateView.php", "404View.php", $data);
        }
    }