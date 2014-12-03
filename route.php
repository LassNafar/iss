<?php

use \controllers\Controller404;

class Route
{
    
    public $controllerName;
    public $actionName;
    
    public $arrayUrl = array ("праздник" => array("Happy","index"),
                               "мэйн" => array("Main","index"));
    /**
     * @run method
    **/
    public function start()
    {
        $this->controllerName = "Main";  //Контроллер поумолчанию
        $this->actionName = "index";     //Метод поумолчанию
        
        $this->redirect();
        
        $this->controllerName = "\\controllers\\Controller" . ucfirst ($this->controllerName);//Имя контроллера с префиксом
        $this->actionName = "action" . ucfirst ($this->actionName);            //Имя метода с префиксом
                
        if (class_exists ($this->controllerName)){
            $controller = new  $this->controllerName;
            $action = $this->actionName;
            
            /*вызыв метода контроллера*/
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

    /**
     * @run 404
    **/
    public function none(){
        $controller = new Controller404;
        $controller->actionIndex();
    }

    /**
     * @return controller&&method is url
    **/    
    public function url(){
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if(!empty($routes[1])){
            $this->controllerName = urldecode($routes[1]);
            echo $this->controllerName;
            if(!empty($routes[2])){
                $this->actionName = urldecode($routes[2]);
            }
        }
    }
    
    /**
     * @return controller&&method is array
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
    }
}