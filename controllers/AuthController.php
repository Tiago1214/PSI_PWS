<?php
require_once('./models/Auth.php');
require_once ('./controllers/BaseController.php');

class AuthController extends BaseController
{
    public function index()
    {
        $this->makeView('login','index');

    }

    public function login()
    {
        if ((isset($_POST['username'])) && (isset($_POST['pass']))) {
            $user = $_POST['username'];
            $pass = $_POST['pass'];

             $auth= new Auth();
            $validacaologin = $auth->checklogin($user, $pass);

            if ($validacaologin == true)

                $this->redirectToRoute('site','index');
            else
                $this->redirectToRoute('login','index');
        }
    }

    public function logout()
    {
        $l=new Auth();
        $l ->logout();
        $this->redirectToRoute('login','index');

    }


}