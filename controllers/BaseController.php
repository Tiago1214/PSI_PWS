<?php

class BaseController
{
    protected function makeView($controllerPrefix,$action,array $params=[], array $params2=[])
    {
        extract($params);
        extract($params2);
        $auth= new Auth();
        if($auth->isLogedIn())
        {
            $username = $auth->getUsername();
            $userrole=$auth->getRole();
            require_once('./views/LayoutBo/header.php');
            require_once ('./views/'.$controllerPrefix.'/'.$action.'.php');
            require_once('./views/LayoutBo/footer.php');
        }else
        {
            require_once('./views/LayoutFo/header.php');
            require_once ('./views/'.$controllerPrefix.'/'.$action.'.php');
            require_once('./views/LayoutFo/footer.php');
        }


    }

    protected function redirectToRoute($controllerPrefix,$action,$params = [])
    {
        $url = 'Location: router.php?c='.$controllerPrefix.'&a='.$action;
        foreach ($params as $paramKey => $paramValue){
            $url.='&'.$paramKey.'='.$paramValue;
        }
        header($url);

    }
}