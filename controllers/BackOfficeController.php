<?php
require_once ('./controllers/BaseController.php');

class BackOfficeController extends BaseController
{
    //Função index abre a vista de backoffice
    public function index(){
        $this->makeView('backoffice','index');
    }
}