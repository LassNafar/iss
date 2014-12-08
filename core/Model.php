<?php
namespace core;

use vendor\User;

    class Model
    {
        public $auth;
        public function __construct()
        {
            $this->auth = new User;
            if(array_key_exists("login", $_POST)&&array_key_exists("pass", $_POST)){
                $this->auth->login($_POST["login"], $_POST["pass"]);
            }
            if(array_key_exists("exit", $_POST)){
                $this->auth->logout();
            }
        }
        
        public function Auth()
        {
            return $this->auth;
        }

        public function getData()
        {

        }
    }

