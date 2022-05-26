<?php
require_once ('./startup/boot.php');
require_once('./controllers/AuthController.php');
require_once ('./controllers/SiteController.php');
require_once ('./controllers/EmpresaController.php');


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

            case 'login':
                $logincontroller=new AuthController();
                $sitecontroller=new SiteController();

                switch ($action) {
                    case 'index':
                        $logincontroller->index();
                        break;
                    case 'login':
                        $logincontroller->login();
                        break;
                    case 'logout':
                        $logincontroller->logout();
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


            case 'chapter':
                $chaptercontroller = new ChapterController();
                switch ($action)
                {
                    case 'index':
                        $chaptercontroller->index($_GET['id']);
                        break;
                    case 'create':
                        $chaptercontroller->create($_GET['id']);
                        break;
                    case 'store':
                        $chaptercontroller->store();
                        break;
                    case 'delete':
                        $chaptercontroller->delete($_GET['id']);
                        break;
                    case 'edit':
                        $chaptercontroller->edit($_GET['id']);
                        break;
                    case 'update':
                        $chaptercontroller->update($_GET['id']);
                        break;

                }
                break;


        }
}
