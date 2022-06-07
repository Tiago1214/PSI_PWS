<?php
require_once ('./startup/boot.php');
require_once('./controllers/AuthController.php');
require_once ('./controllers/SiteController.php');
require_once ('./controllers/EmpresaController.php');
require_once ('./controllers/BackOfficeController.php');
require_once ('./controllers/FaturaController.php');


// ****** ROTA POR OMISSAO ******
if(!isset($_GET['c']) && !isset($_GET['a']))
    {
        $controller = new SiteController();
        $controller ->index();
    }
// ****** ROTA DA APLICACAO ******
else{
        $controller=$_GET['c'];
        $action=$_GET['a'];


       switch ($controller) {

            case 'auth':
                $authcontroller=new AuthController();

                switch ($action) {
                    case 'index':
                        $authcontroller->index();
                        break;
                    case 'auth':
                        $authcontroller->login();
                        break;
                    case 'logout':
                        $authcontroller->logout();
                        break;
                }
            break;



            case 'site':
                $sitecontroller= new SiteController();
                switch ($action){
                    case 'index':
                        $sitecontroller->index();
                        break;
                }
                break;

            case 'empresa':
                $empresacontroller = new EmpresaController();
                switch ($action) {
                    case 'index':
                        $empresacontroller->index();
                        break;
                    case 'show':
                        $empresacontroller->show($_GET['id']);
                        break;
                   /* case 'create':
                        $empresacontroller->create();
                        break;
                    case'store':
                        $empresacontroller->store();
                        break;*/
                    case 'edit':
                        $empresacontroller->edit($_GET['id']);
                        break;
                    case 'update':
                        $empresacontroller->update($_GET['id']);
                        break;
                        /* case 'delete':
                        $empresacontroller->delete($_GET['id']);
                        break;*/


                }
                break;


            case 'backoffice':
                $backofficecontroller = new BackOfficeController();
                switch ($action)
                {
                    case 'index':
                        $backofficecontroller->index();
                        break;
                }
                break;

           case 'fatura':
               $faturacontroller=new FaturaController();
               switch($action){
                   case 'show':
                       $faturacontroller->show();
                       break;
               }


        }
}
