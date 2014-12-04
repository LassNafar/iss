<?php

use \controllers\Controller404;

class Route
{
    
    public $controllerName;
    public $actionName;
    public $setting;
    
    public $arrayUrl = array ("праздник" => array("Happy","index"),
                               "мэйн" => array("Main","index"));
    /**
     * @run method
    **/
    public function start()
    {
        $this->redirect();
        /*проверка существования класса и создание экземпляра*/
        if (class_exists ($this->controllerName)){
            $controller = new  $this->controllerName;
            $controller -> settings = $this->param();
            $controller -> settings["controller"] = $this->controllerName;
            $action = $this->actionName;
            
            /*вызыв метода контроллера и проверка его существования*/
            if(method_exists($controller, $action)){
                $controller -> settings["action"] = $action;
                $controller->$action();
            }
            else{
                $this->none();
            }
        }
        else{
            $this->none();
        }
    }
    
    public function param()
    {   
        /*извлекаем из url массив входных параметров*/
        $get = $_SERVER['QUERY_STRING'];
        if(!empty($get)){
            $str = explode('&&', $get);
            for($i=0;$i<count($str);$i++){
                $strstr = explode('=', $str[$i]);
                $settings[$strstr[0]] = $strstr[1]; 
            }
            return $settings;
        }
        else{
            return false;
        }
    }
    /**
     * @run 404
    **/
    public function none(){
        $controller = new Controller404;
        $controller->actionIndex();
        $controller -> settings = $this->param();
        $controller -> settings["controller"] = "Controller404";
        $controller -> settings["action"] = "actionIndex";
    }

    /**
     * @return controller&&method name is url
    **/    
    public function url(){
        $this->controllerName = "Main";  //Контроллер поумолчанию
        $this->actionName = "Index";     //Метод поумолчанию
        /*извлекаем контроллер и метод из url*/
        $routes = explode('/', str_replace("?" . $_SERVER['QUERY_STRING'], "", $_SERVER['REQUEST_URI']));
        if(!empty($routes[1])){
            $this->controllerName = urldecode($routes[1]);
            
            if(!empty($routes[2])){
                $this->actionName = urldecode($routes[2]);
            }
        }
    }
    
    /**
     * @return controller&&method name is array
    **/    
    public function redirect(){
        $this->url();
        
        foreach($this->arrayUrl as $key => $val){
            if($this->controllerName == $key){
                $this->controllerName = $val[0];
                
                if(!empty($val[1])){
                    $this->actionName = $val[1];
                }
            }
        }
        /*Добавление префиксов к именам контроллера и метода*/
        $this->controllerName = "\\controllers\\Controller" . ucfirst ($this->controllerName);
        $this->actionName = "action" . ucfirst ($this->actionName);
    }
}