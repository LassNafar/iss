<?php
ini_set('display_errors', 1);
class R
{
    public $arr1 = "34";
    
    function ech(){
        $str = "arr"."1";
        $r="1";
    return $this->$str.$r;
    }
}
$r=new R();
echo $r->ech();
//$r->ech();
//var_dump($r);
//echo $r->arr1[1];
require_once "autoloader.php";
require_once "app.php";
