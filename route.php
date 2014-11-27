<?php

class Route
{
    public static function start()
    {
        $controller_name = "Main";  //Контроллер поумолчанию
        $action_name = "index";     //Метод поумолчанию
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);    //чтение адреса

        if(!empty($routes[1])){
            $controller_name = $routes[1];
        }
        
        if(!empty($routes[2])){
            $action_name = $routes[2];
        }
        
        $model_name = "Model_" . $controller_name;          //Имя модели с префиксом
        $controller_name = "Controller_" . $controller_name;//Имя контроллера с префиксом
        $action_name = "action_" . $action_name;            //Имя метода с префиксом
        
        /*подключаем файл модели*/
        $model_file = strtolower($model_name) . ".php";
        $model_path = "models/" . $model_file;
        
        if (file_exists($model_path)){
            include $model_path;
        }
        
        /*подключаем файл контроллера*/
        $controller_file = strtolower($controller_name) . ".php";
        $controller_path = "controllers/" . $controller_file;

        if(file_exists($controller_path)){
            include $controller_path;
        }
        
        /*Создаем контроллер*/
        $controller = new $controller_name;
        $action = $action_name;
        
        /*вызыв метода контроллера*/
        if(method_exists($controller, $action)){
            $controller->$action();
        }
    }
}