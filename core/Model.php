<?php
namespace core;

use vendor\User;

    class Model
    {
        static $auth;
        
        public function __construct()
        {
            self::$auth = new User;
            if(array_key_exists("login", $_POST)&&array_key_exists("pass", $_POST)){
                self::$auth->login($_POST["login"], $_POST["pass"]);
            }
            if(array_key_exists("exit", $_POST)){
                self::$auth->logout();
            }
        }

        public function getData()
        {

        }
    }

