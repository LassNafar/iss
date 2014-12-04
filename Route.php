<?php

use \controllers\Controller404;

class Route
{
    
    public $controllerName;
    public $actionName;
    public $settings;
    public $url;
    
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
            
            $this->param();
            $controller->settings = $this->settings;
            
            $action = $this->actionName;
            
            /*вызыв метода контроллера и проверка его существования*/
            if(method_exists($controller, $action)){
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
                if(!empty($strstr[1])){
                    $this->settings[$strstr[0]] = $strstr[1];
                }
            }
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
        $controller -> settings = $this->param();
        $controller -> settings["controller"] = "Controller404";
        $controller -> settings["action"] = "actionIndex";
        $controller->actionIndex();
    }

    /**
     * @return controller&&method name is url
    **/    
    public function url(){
        $this->controllerName = "Main";  //Контроллер поумолчанию
        $this->actionName = "Index";     //Метод поумолчанию
        /*извлекаем контроллер и метод из url*/
        $this->settings['url'] = $_SERVER['SERVER_NAME'] . str_replace("?" . $_SERVER['QUERY_STRING'], "", $_SERVER['REQUEST_URI']);
        $routes = explode('/', $this->settings['url']);
        
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
        $this -> settings["controller"] = ucfirst ($this->controllerName);
        $this -> settings["action"] = ucfirst ($this->actionName);
        /*Добавление префиксов к именам контроллера и метода*/
        $this->controllerName = "\\controllers\\Controller" . ucfirst ($this->controllerName);
        $this->actionName = "action" . ucfirst ($this->actionName);
    }
}