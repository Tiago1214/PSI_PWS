<?php
include_once ('./controllers/BaseController.php');

class SiteController extends BaseController
{
    public function index(){
        $this->makeView('site','index');
    }

}