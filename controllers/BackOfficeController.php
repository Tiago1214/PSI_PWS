<?php
require_once ('./controllers/BaseController.php');

class BackOfficeController extends BaseAuthController
{
    //Função index abre a vista de backoffice

    public function index(){
        $auth=new Auth();
        $role=$auth->getRole();
        $produto=Produto::all();
        $fatura=Fatura::all();
        $this->makeView('backoffice','index',['role'=>$role,'produto'=>$produto,'fatura',$fatura]);
    }
}