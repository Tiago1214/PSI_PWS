<?php
require_once ('./controllers/BaseController.php');

class BackOfficeController extends BaseController
{
    //Função index abre a vista de backoffice
    public function index(){
        $auth=new Auth();
        $role=$auth->getRole();
        $this->makeView('backoffice','index',['role'=>$role]);
    }
}