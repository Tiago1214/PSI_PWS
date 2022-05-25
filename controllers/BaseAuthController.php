<?php
require_once ('./controllers/BaseController.php');
require_once('./models/Auth.php');

class BaseAuthController extends BaseController
{
    protected function loginFilter()
    {
        $login= new Auth();

        if(!$login->IsLogedIn()) {
            header('Location: ./router.php' . INVALID_ACESS_ROUTE);
        }
    }
}