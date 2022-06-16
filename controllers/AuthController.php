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

    //Função de login verifica se o utilizador introduziu as credenciais corretamente, se sim inicia sessão e vai para a vista de cliente,
    //senão volta para a janela de login
    public function login()
    {
        //veririficar se o utilizador introduziu dados
        if ((isset($_POST['username'])) && (isset($_POST['pass']))) {
            $user = $_POST['username'];
            $pass = $_POST['pass'];

            $auth= new Auth();

            //Verificar se o utilizador introduziu os dados corretamente
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

    //Função logout termina a sessão de um utilizador
    public function logout()
    {
        $l=new Auth();
        $l ->logout();
        $this->redirectToRoute('site','index');

    }


}