<?php

namespace models;

class ModelForm
{
    public static function form($nameForm, $arrayFields, $nameButton)
    {
        $form = "<form method='POST' action='' style='width: 300px; height: 140px; background-color: grey;'>";
        $form .= "<p>".$nameForm."</p>";
        foreach ($arrayFields as $key => $val) {
            $form .= "<input type='".$val."' name='".$key."'>";
        }
        $form .= "<input type='submit' value='".$nameButton."'>";
        $form .= "</form>";
        return $form;
    }
}