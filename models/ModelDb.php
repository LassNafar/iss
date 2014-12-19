<?php 

namespace models;

class ModelDb
{
    private static $instance = null;  //экземпляр объекта
    private $dbh;

    public static function getInstance() { // получить экземпляр данного класса
        if (self::$instance === null) { // если экземпляр данного класса  не создан
            self::$instance = new self;  // создаем экземпляр данного класса
        }
        return self::$instance; // возвращаем экземпляр данного класса
    }
        
    function __construct()
    {
        $user = "root";
        $pass = "123456";
        $this->dbh = new \PDO('mysql:host=localhost;dbname=MyProject', $user, $pass, array(
            \PDO::ATTR_PERSISTENT => true
        ));
    }
    
    public function query($query)
    {
        echo $query;
        $result = $this->dbh->query($query);
        return $result->fetch(\PDO::FETCH_ASSOC);
    }

}