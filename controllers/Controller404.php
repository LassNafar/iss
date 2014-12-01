<?php

namespace controllers;

use core\Controller;
use core\View;

    class Controller404 extends Controller
    {
        public function __construct()
        {
            $this->view = new View;
        } 

        public function action_index ()
        {
            $data = "404 NOT FOUND";
            $this->view->generate("404View.php","TemplateView.php", $data);
        }
    }