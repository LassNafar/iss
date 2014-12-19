<?php
namespace models;

use core\Model;
use models\ModelDb;
use models\ModelUser;
use models\ModelForm;

    class ModelRegistry extends Model
    {
        public function getData()
        {
            return "16.05.90";
        }
        
        public function create()
        {
            if (!array_key_exists("name", $_SESSION)) {
                if ($_POST) {
                    foreach ($_POST as $key => $val) {
                        $arrFields[] = $key;
                        $arrValue[] = $val;
                    }
                    $db = Db::getInstance();
                    if (!ModelUser::getObj()->check($_POST['login'],$_POST['password'])) {
                        $db->query("INSERT INTO User (`".implode("`,`", $arrFields)."`) VALUES ('".implode("','", $arrValue)."')");
                        ModelUser::getObj()->login($_POST['login'],$_POST['password']);
                    }
                    Model::refresh();
                }
                $array = array("login" => "text", "password" => "text", "status" => "test");
                return ModelForm::form("Регистрация", $array, "Сохранить");
            }
        }
    }