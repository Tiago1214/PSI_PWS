<?php
require_once ('./startup/boot.php');
require_once('./controllers/AuthController.php');
require_once ('./controllers/SiteController.php');
require_once ('./controllers/EmpresaController.php');
require_once ('./controllers/BackOfficeController.php');
require_once ('./controllers/FaturaController.php');
require_once ('./controllers/ProdutoController.php');

require_once ('./controllers/UserController.php');

require_once ('./controllers/IvaController.php');



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
               $faturacontroller = new FaturaController();
               switch ($action)
               {
                   case 'index':
                       $faturacontroller->index();
                       break;

                   case 'create':
                       $faturacontroller->create();
                       break;
                   case 'store':
                       $faturacontroller->store($_GET['id']);

               }
               break;

           case 'produto':
               $produtocontroller = new ProdutoController();
               switch ($action) {
                   case 'index':
                       $produtocontroller->index();
                       break;
                   case 'show':
                       $produtocontroller->show($_GET['id']);
                       break;
                   case 'create':
                       $produtocontroller->create();
                       break;
                   case'store':
                       $produtocontroller->store();
                       break;
                   case 'edit':
                       $produtocontroller->edit($_GET['id']);
                       break;
                   case 'update':
                       $produtocontroller->update($_GET['id']);
                       break;
                   case 'delete':
                       $produtocontroller->delete($_GET['id']);
                       break;


               }
               break;

           case 'iva':
               $ivacontroller = new IvaController();
               switch ($action) {
                   case 'index':
                       $ivacontroller->index();
                       break;
                   case 'show':
                       $ivacontroller->show($_GET['id']);
                       break;
                   case 'create':
                       $ivacontroller->create();
                       break;
                   case'store':
                       $ivacontroller->store();
                       break;
                   case 'edit':
                       $ivacontroller->edit($_GET['id']);
                       break;
                   case 'update':
                       $ivacontroller->update($_GET['id']);
                       break;
                   case 'delete':
                       $ivacontroller->delete($_GET['id']);
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

           case 'user':
               $usercontroller=new UserController();
               switch($action){
                   case 'index':
                       $usercontroller->index();
                       break;
                   case 'show':
                       $usercontroller->show($_GET['id']);
                       break;
                   case 'edit':
                       $usercontroller->edit($_GET['id']);
               }


        }
}
