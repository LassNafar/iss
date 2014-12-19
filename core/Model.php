<?php
namespace core;

use core\View;
use models\ModelUser;

    class Model
    {
        static $auth;
        
        public function __construct()
        {
            self::$auth = ModelUser::getObj();
            if(array_key_exists("LOGIN", $_POST)&&array_key_exists("PASS", $_POST)){
                self::$auth->login($_POST["LOGIN"], $_POST["PASS"]);
            }
            if(array_key_exists("exit", $_POST)){
                self::$auth->logout();
            }
        }

        public function getData()
        {

        }
        
        public function create()
        {
            
        }
        
        public function save()
        {
            
        }
        
        public function refresh()
        {
            header("Location: http://".$_SERVER['SERVER_NAME'].View::createUrl($_SERVER['REQUEST_URI']));
        }
    }