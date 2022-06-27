<?php
require_once ('./controllers/BaseController.php');

class BackOfficeController extends BaseController
{
    //Função index abre a vista de backoffice
    public function index(){
        $auth=new Auth();
        $role=$auth->getRole();
        $client=$auth->getUserId();
        $faturas=Fatura::all();
        $this->makeView('backoffice','index',['role'=>$role,'client'=>$client],['faturas'=>$faturas]);
    }
}