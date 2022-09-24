<?php

namespace TeachStore\Classes;

class Request
{
    public function get(string $key)
    {
       return $_GET[$key];
    }
    public function post(string $key)
    {
       return $_POST[$key];
    }

    public function files(string $key)
    {
       return $_FILES[$key];
    }

    public function postClean(string $key)
    {
      return htmlspecialchars(trim($_POST[$key]));
    }
    
    public function getHas(string $key) : bool // data type of return
    {
      //  if(isset($_GET[$key])){
      //    return true;
      //  }else{
      //    return false;
      //  }
      return isset($_GET[$key]);
    }

    public function postHas(string $key) : bool // data type of return
    {
      //  if(isset($_POST[$key])){
      //    return true;
      //  }else{
      //    return false;
      //  }
      return isset($_POST[$key]);
    }

    public function redirect($path)
    {
      header("location: " . URL . $path);
    }

    public function aredirect($path)
    {
      header("location: " . AURL . $path);
    }




}