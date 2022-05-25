<?php
require_once('./controllers/AuthController.php');
require_once ('./controllers/PlanoController.php');
require_once ('./controllers/SiteController.php');
require_once ('./controllers/BookController.php');
require_once ('./controllers/ChapterController.php');
require_once ('./startup/boot.php');

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
                }
            break;

            case 'plano':
                $planocontroller= new PlanoController();
                switch ($action) {
                    case 'index':
                        $planocontroller->index();
                        break;
                    case 'show':
                        $planocontroller->show();
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

            case 'book':
                $bookcontroller = new BookController();
                switch ($action) {
                    case 'index':
                        $bookcontroller->index();
                        break;
                    case 'show':
                        $bookcontroller->show($_GET['id']);
                        break;
                    case 'create':
                        $bookcontroller->create();
                        break;
                    case'store':
                        $bookcontroller->store();
                        break;
                    case 'edit':
                        $bookcontroller->edit($_GET['id']);
                        break;
                    case 'update':
                        $bookcontroller->update($_GET['id']);
                        break;
                    case 'delete':
                        $bookcontroller->delete($_GET['id']);
                        break;


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
