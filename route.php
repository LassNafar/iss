<?php

class Route
{
    /**
     * @run method
    **/
    public static function start()
    {
        $controller_name = "Main";  //Контроллер поумолчанию
        $action_name = "index";     //Метод поумолчанию
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);    //чтение адреса

        if(!empty($routes[1])){
            $controller_name = $routes[1];
            $controller_name = ucfirst($controller_name);
        }
        
        if(!empty($routes[2])){
            $action_name = $routes[2];
        }
        
        $model_name = "Model" . $controller_name;          //Имя модели с префиксом
        $controller_name = "Controller" . $controller_name;//Имя контроллера с префиксом
        $action_name = "action_" . $action_name;            //Имя метода с префиксом

        $controller_name = "\\controllers\\" . $controller_name;

        $controller = new  $controller_name();
        $action = $action_name;

        /*вызыв метода контроллера*/
        if(method_exists($controller, $action)){
            $controller->$action();
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