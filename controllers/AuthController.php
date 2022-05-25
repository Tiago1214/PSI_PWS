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
        if ((isset($_POST['user'])) && (isset($_POST['pass']))) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $l = new Auth();
            $validacaologin = $l->checklogin($user, $pass);

            if ($validacaologin == true)

                $this->redirectToRoute('plano','index');
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