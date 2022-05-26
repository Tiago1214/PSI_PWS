<?php
require_once ('./models/User.php');


class Auth
{
    public function __construct()
    {
        if(session_status()!=PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public function checkLogin($username,$pass){
        $user = User::find_by_username_and_password($username,$pass);

        if(!is_null($user)) {
            $_SESSION['username']=$username;
            $_SESSION['role']=$user->role;
            $_SESSION['id']=$user->id;

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
        return isset($_SESSION['username']);
    }

    public function getUsername()
    {
        if(isset($_SESSION['username']))
        {
            return $_SESSION['username'];
        }else
        {
            return null;
        }
    }
    public function getRole()
    {
        if(isset($_SESSION['role']))
        {
            return $_SESSION['role'];
        }else
        {
            return null;
        }
    }

    public function  getUserId()
    {
        if(isset($_SESSION['id']))
        {
            return $_SESSION['id'];
        }else
        {
            return null;
        }
    }
}