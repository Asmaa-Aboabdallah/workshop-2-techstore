<?php

namespace TeachStore\Classes\Validation;

class Image implements ValidationRule
{
    public function check(string $name , $value)
    {
        $allowdExt = ['png' , 'jpg' , 'jpeg' , 'gif'];
        $ext = pathinfo($value['name'], PATHINFO_EXTENSION);

        if(! in_array($ext , $allowdExt)){
            return "$name extension is not allowed , please upload jpg,jpeg,png,gif";
        }
        return false;
    }
}