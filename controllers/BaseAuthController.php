<?php
require_once ('./controllers/BaseController.php');
require_once('./models/Auth.php');

class BaseAuthController extends BaseController
{
    protected function loginFilter()
    {
        $auth= new Auth();

        if(!$auth->IsLogedIn()) {
            header('Location: ./router.php' . INVALID_ACESS_ROUTE);
        }
    }

    protected function loginFilterbyRole($roles=[])
    {
        $auth = new Auth();
        $role = $auth->getRole();
        $validrole= in_array($role, $roles);
        if(!$validrole) {
            header('Location: ./router.php' . INVALID_ACESS_ROUTE);
        }
    }
}