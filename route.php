<?php

class Route
{
    
    public $controller_name;
    public $action_name;
    
    public $_arrayUrl = array ("праздник" => array("Happy","index"),
                               "мэйн" => array("Main","index"));
    /**
     * @run method
    **/
    public function start()
    {
        $this->controller_name = "Main";  //Контроллер поумолчанию
        $this->action_name = "index";     //Метод поумолчанию
        
        $this->redirect();
        
        $this->controller_name = "\\controllers\\Controller" . ucfirst($this->controller_name);//Имя контроллера с префиксом
        $this->action_name = "action_" . $this->action_name;            //Имя метода с префиксом

        if($controller = new  $this->controller_name()){
            $action = $this->action_name;
            
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
    
    public function none(){
        $controller = new \controllers\Controller404;
        $controller->action_index();
    }


    public function url(){
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if(!empty($routes[1])){
            $this->controller_name = $routes[1];
            
            if(!empty($routes[2])){
                $this->action_name = $routes[2];
            }
        }
    }
    
    public function redirect(){
        $this->url();
        
        foreach($this->_arrayUrl as $key => $val){
            if($this->controller_name == $key){
                $this->controller_name = $val[0];
                
                if(!empty($val[1])){
                    $this->action_name = $val[1];
                }
            }
        }
    }
    
    /**
     * @param $url
     * @run method
    **/
    public static function restart($url)
    {
        $url = $_SERVER['SERVER_NAME'] . "/" . $url; 
        header("Location: http://" . $url);
    }
}