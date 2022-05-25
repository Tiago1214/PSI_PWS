<?php
require_once ('./models/Plano.php');
require_once('./models/Auth.php');
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');


class PlanoController extends BaseAuthController
{
    public function index(){
        $this->loginFilter();
        $this->makeView('plano','index');

    }
    public function show(){
        $this->loginFilter();
        $credito = $_POST['credito'];
        $numPrest = $_POST['numPrest'];
        $p = new Plano();
        $matrizPrest= $p -> calculaPlano($credito,$numPrest);
        $this->makeView('plano','vistaplano',['matrizPrest'=>$matrizPrest]);
    }

}