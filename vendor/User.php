<?php

namespace vendor;

class User
{
    private $login = "admin";
    private $password = "admin";
    private $status = "user";
    private $name = "Aggravator";
    
    public function login($login, $pass)
    {
        if ($login==$this->login&&$pass==$this->password){
            $this->session($this->name, $this->status);
        }
    }
    
    private function session($name, $status)
    {
        $_SESSION['user'] = $name;
        $_SESSION['status'] = $status;
    }
    
    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['status']);
    }
    
    public function getParam($parametr)
    {
        if(isset($_SESSION['status'])&&$_SESSION['status'] == $this->status){
            return $this->$parametr;
        }
    }
}