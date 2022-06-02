<?php
require_once ('./controllers/BaseController.php');
require_once ('./controllers/BaseAuthController.php');

class ProdutoController extends BaseAuthController
{
    public function  __Construct__()
    {
        $this->loginFilterbyRole(['funcionario','admin']);
    }

}