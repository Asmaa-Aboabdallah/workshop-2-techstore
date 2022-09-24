<?php

namespace TeachStore\Classes;

class File
{
    private $name , $tmpname ,  $uploadName;
    public function __construct($file)
    {
        $this->name = $file['name'];
        $this->tmpname = $file['tmp_name'];
        
    }

    public function rename()
    {
        $ext = pathinfo($this->name , PATHINFO_EXTENSION);
        $randomStr = uniqid();
        $this->uploadName = "$randomStr.$ext";
        return $this;
    }

    public function setName($name)
    {
        $this->uploadName = $name;
        return $this;
    }

    public function upload()
    {
        $desrination = PATH . "uploads/" . $this->uploadName;
        move_uploaded_file($this->tmpname , $desrination);

        return $this->uploadName;
    }
}