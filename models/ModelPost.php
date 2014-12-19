<?php

namespace models;

use core\Model;
use models\ModelForm;
use models\ModelDb;
use models\ModelUser;

class ModelPost
{
    private $db;
    
    public function __construct()
    {
        $this->db = ModelDb::getInstance();
    }

    public function output()
    {
        return $this->db->query("SELECT `login`,`post`,`create_date` FROM `Post`");;
    }
    
    public function create()
    {
        if (array_key_exists("name", $_SESSION)) {
                if ($_POST) {
                    foreach ($_POST as $key => $val) {
                        $arrFields[] = $key;
                        $arrValue[] = $val;
                    }
                    if ($_POST['post']) {
                        $this->db->query("INSERT INTO Post (`login`,`".implode("`,`", $arrFields)."`,`create_date`) VALUES ('".$_SESSION['name']."','".implode("','", $arrValue)."','".date("Y-m-d H:i:s")."')");
                    }
                    Model::refresh();
                }
                $array = array("post" => "text");
                return ModelForm::form("Пост", $array, "Сохранить");
            }
    }
}