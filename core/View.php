<?php
namespace core;

use models\ModelUser;

    class View
    {
        public $user;
        
        public function __construct()
        {
            $this->user = Model::$auth;
        }

                /**
         * include template
        **/
        
        
        public function generate($template_view, $content_view, $data = NULL)
        {
            include "views/" . $template_view;
        }
        
        public static function indexNull($index){
            if((ucfirst($index) == "Index")){
                $index = "";
            }
            return $index;
        }

        public static function createUrl($url){
            $getUrl = explode("/",$url);
            if(isset($getUrl[2])){
                $getUrl[2] = self::indexNull($getUrl[2]);
            }
            else{
                $getUrl[2] = "";
            }
            foreach(\Route::$arrayUrl as $key => $val){
                $val[1] = self::indexNull($val[1]);

                if((ucfirst($getUrl[1]) == ucfirst($val[0]))&&(ucfirst($getUrl[2]) == ucfirst($val[1]))){
                    return "/" . $key;
                }
            }
            return $url;
        }
    }

