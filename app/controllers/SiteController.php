<?php
include_once ('./controllers/BaseController.php');

class SiteController extends BaseController
{
    //Este controlador é usado para criar a vista do front office
    public function index(){
        $this->makeView('site','index');
    }

}