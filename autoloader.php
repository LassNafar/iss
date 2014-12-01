<?php
    
    class autoload
    {
        private static $path;
        
        static public function load ($className){
            self::$path = str_replace("\\", "/", $className) . ".php";
            if(file_exists(self::$path) == true){
                //echo self::$path;
                require_once self::$path;
            }
        }
    }
    
    spl_autoload_register (array('autoload', 'load'));
    
    

