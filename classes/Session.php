<?php

namespace TeachStore\Classes;

class Session
{
    // to restrict when create object that no function executed until session start
    public function __construct() 
    {
        // to check if there is session started before
        if (session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key)
    {
        return $_SESSION[$key]; // Value
    }
    public function has(string $key) : bool
    {
        return isset($_SESSION[$key]);
    }
    public function remove(string $key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        $_SESSION = [];
        session_destroy();
    }

}