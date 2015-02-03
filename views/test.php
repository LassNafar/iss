<?php

class Bouling
{
    public $str = "X|X|1-|2-|3-|4-|5-|6-|7/|X| |XX";
    public $strike;
    public $sum = 0;
    public static $arrFrame;
    public $arrFrameObj;

    public function __construct(){
        $arr = explode("|", $str);
        foreach ($arr as $key => $val) {
            echo $val;
            if ($val == "X") { 
                self::$arrFrame[$key][0] = 10;
            }
            if ($val['1'] == "/") {
                self::$arrFrame[$key][0] = $val[0];
                self::$arrFrame[$key][1] = 10 - $val[0];
            }
            if ($val['1'] == "-") {
                self::$arrFrame[$key][0] = $val[0];
                self::$arrFrame[$key][0] = 0;
            }
            if ($val == " ") {
                self::$arrFrame[$key][0] = $arr[$key+1][0];
                self::$arrFrame[$key][1] = $arr[$key+1][1];
                $this->arrFrameObj[$key] = new Frame($key);
                break;
            }
            else {
                self::$arrFrame[$key][0] = $val[0];
                self::$arrFrame[$key][1] = $val[1];
            }
            $this->arrFrameObj[$key] = new Frame($key);
        }
    }

    public function game(){
        for ($i=0;$i<=9;$i++) {
            $this->sum += $this->arrFrameObj[$i]->getFrame();
            if ($this->arrFrameObj[$i]->strike) {
                if($this->arrFrameObj[$i+1]->strike) {
                    $this->sum += $this->arrFrameObj[$i+2]->getShot();
                }
                $this->sum += $this->arrFrameObj[$i+1]->getFrame();
            }
            if ($this->arrFrameObj[$i]->spare) {
                $this->sum += $this->arrFrameObj[$i+1]->getShot();
            }
        }
        return $this->sum;
    }

}

class Frame
{
    public $strike = false;
    public $spare = false;
    public $key;

    public function __construct($key){
        $this->key = $key;
        if (Bouling::$arrFrame[$key] == "10"&&$key<10) {
            $this->strike = true;
        }
        if (Bouling::$arrFrame[$key][0]+Bouling::$arrFrame[$key][1]==10&&$key<10) {
            $this->spare = true;
        }
    }

    public function getFrame(){
        if ($this->strike) {
            return Bouling::$arrFrame[$this->keykey];
        }
        else {
            return Bouling::$arrFrame[$this->key][0] + Bouling::$arrFrame[$this->key][1];
        }
    }

    public function getShot(){
        if ($this->strike) {
            return Bouling::$arrFrame[$this->key];
        }
        else {
            return Bouling::$arrFrame[$this->key][0];
        }
    }
}
