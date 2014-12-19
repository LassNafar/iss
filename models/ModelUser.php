<?php

namespace models;

use models\ModelDb;

class ModelUser
{
    private $user;
    public static $obj = null;
    
    public static function getObj()
    {
        if (self::$obj == null) {
            self::$obj = new self;
        }
        return self::$obj;
    }
    
    public function login($login, $pass)
    {
        if ($this->check($login, $pass)) {
            $this->session();
            return true;
        }
        return false;
    }
    
    public function check($login, $pass)
    {
        $db = ModelDb::getInstance();
        $res = $db->query("SELECT `login`,`status` FROM `User` WHERE `login` = '".$login."' AND `password` = '".$pass."' ");
        if($res) {
            $this->user['name'] = $res['login'];
            $this->user['status'] = $res['status'];
            return true;
        }
        return false;
    }
    
    private function session()
    {
        $_SESSION['name'] = $this->user['name'];
        $_SESSION['status'] = $this->user['status'];
    }
    
    public function logout()
    {
        unset($_SESSION['name']);
        unset($_SESSION['status']);
    }
    
    public function getParam($parametr)
    {
        if (isset($_SESSION['status'])) {
            return $_SESSION[$parametr];
        }
        else {
            return false;
        }
    }
}