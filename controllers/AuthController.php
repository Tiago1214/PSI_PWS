<?php
require_once('./models/Auth.php');
require_once ('./controllers/BaseController.php');

class AuthController extends BaseController
{
    //Função para criar a view de login
    public function index()
    {
        $this->makeView('auth','index');

    }

    public function login()
    {
        if ((isset($_POST['username'])) && (isset($_POST['pass']))) {
            $user = $_POST['username'];
            $pass = $_POST['pass'];

             $auth= new Auth();
            $validacaologin = $auth->checklogin($user, $pass);

            if ($validacaologin == true){
                $auth->getRole();
                if($auth =='administrador' || $auth =='funcionario') {
                    $this->redirectToRoute('backoffice', 'index');
                }else
                    $this->redirectToRoute('site', 'index');
            }
            else{

                $this->redirectToRoute('auth','index');

            }
        }
    }

    public function logout()
    {
        $l=new Auth();
        $l ->logout();
        $this->redirectToRoute('site','index');

    }


}