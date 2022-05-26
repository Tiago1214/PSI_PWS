<?php
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class ProductController extends BaseAuthController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','admin']);
    }

}