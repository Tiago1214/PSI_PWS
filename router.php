<?php
require_once ('./startup/boot.php');
require_once('./controllers/AuthController.php');
require_once ('./controllers/SiteController.php');
require_once ('./controllers/EmpresaController.php');
require_once ('./controllers/BackOfficeController.php');
require_once ('./controllers/FaturaController.php');
require_once ('./controllers/ProdutoController.php');
require_once ('./controllers/LinhaFaturaController.php');

require_once ('./controllers/UserController.php');

require_once ('./controllers/IvaController.php');
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
                    case 'create':
                        $empresacontroller->create();
                        break;
                    case'store':
                        $empresacontroller->store();
                        break;
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
                   case 'posicao':
                       $produtocontroller->posicao($_GET['id']);
                       break;
                   case 'selectproduto':
                       $produtocontroller->selectproduto('./router.php?c=linhafatura&a=create&idf='.$_GET['id']);
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
                   case 'posicao':
                       $ivacontroller->posicao($_GET['id']);
                       break;

               }
               break;





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
                       break;
                   case 'update':
                       $usercontroller->update($_GET['id']);
                       break;
                   case 'create':
                       $usercontroller->create();
                       break;
                   case 'store':
                       $usercontroller->store();
                       break;
                   case 'posicao':
                       $usercontroller->posicao($_GET['id']);
                       break;
                   case 'changedados':
                       $usercontroller->changedados($_GET['id']);
                   case 'selectclient':
                       $usercontroller->selectclient();
                       break;

               }
               break;

           case 'fatura':
               $faturacontroller=new FaturaController();
               switch($action){
                   case 'index':
                       $faturacontroller->index();
                       break;
                   case 'show':
                       $faturacontroller->show($_GET['id']);
                       break;
                   case 'create':
                       $faturacontroller->create();
                       break;
                   case 'store':
                       $faturacontroller->store($_GET['id']);
                       break;
                   case 'update':
                       $faturacontroller->update($_GET['idf']);
                       break;
                   case 'cancel':
                       $faturacontroller->cancel($_GET['idf']);
                       break;
                   case 'edit':
                       $faturacontroller->edit($_GET['idf']);
                       break;
                   case 'showclientinvoice':
                       $faturacontroller->showclientinvoice();
                       break;
                   case 'pdf':
                       $faturacontroller->generatepdf($_GET['idf']);
                       break;
               }
               break;


           case 'linhafatura':
               $linhafaturacontroller=new LinhaFaturaController();
               switch ($action)
               {
                   case 'create':
                       if(isset($_GET['idp'])){
                           $linhafaturacontroller->create($_GET['idf'],$_GET['idp']);
                       }
                       else
                           $linhafaturacontroller->create($_GET['idf'],null);
                       break;
                   case 'store':
                       $linhafaturacontroller->store($_GET['idf'],$_GET['idp']);
                       break;
                   case 'delete':
                       $linhafaturacontroller->delete($_GET['idlf'],$_GET['idf']);
                       break;
                   case 'editquantidade':
                       $linhafaturacontroller->editquantidade($_GET['idf'],$_GET['idlf']);
                       break;
                   case 'guardarquantidade':
                       $linhafaturacontroller->guardarquantidade($_GET['idlf']);
                       break;
               }
               break;



        }
}
