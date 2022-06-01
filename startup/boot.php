<?php
require_once './vendor/autoload.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/invoicedb',

        )
    );
});

define('APP_NAME','Invoice App');
define ('INVALID_ACESS_ROUTE' , '?c=auth&a=index');