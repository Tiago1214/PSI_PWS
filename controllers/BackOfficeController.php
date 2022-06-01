<?php
require_once ('./controllers/BaseController.php');

class BackOfficeController extends BaseController
{
    public function index(){
        $this->makeView('backoffice','index');
    }

}