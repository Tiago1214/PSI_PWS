<?php
session_start();
class Auth
{
    public function checkLogin($user,$pass){
        if($user == 'admin' && $pass== '1234') {
            $_SESSION['user']=$user;
            return true;
        }
        else {
            return false;
        }
    }

    public function logout(){
        session_destroy();
    }
    function IsLogedIn()
    {
        return isset($_SESSION['user']);
    }

    public function getUsername()
    {
        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }else
        {
            return null;
        }
    }
}