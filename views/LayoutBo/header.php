<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fatura +| Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="./public/BO/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./public/BO/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="./public/BO/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/BO/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="./public/BO/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="./public/BO/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="./public/BO/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="./public/BO/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./public/BO/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="./public/BO/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="./router?c=backoffice&a=index" class="logo">
            <span class="logo-mini"><b>F</b>+</span>
            <span class="logo-lg"><b>Fatura</b>+</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- User Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="./public/img/UserIcon.png" class="user-image">
                            <span class="hidden-xs"><?php
                                if(isset($username)){
                                    echo $username;
                                }
                                ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="./public/img/UserIcon.png" class="img-circle" alt="">

                                <p>
                                    <?php
                                    if(isset($username)){
                                        echo $username;
                                    }
                                    ?></span>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <?php
                                    if(isset($username))
                                    {
                                        echo'<a href="./router.php?c=auth&a=logout" class="btn btn-default btn-flat">Logout('.$username.')</a>';
                                    }
                                    ?>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                <li>
                    <a href="router.php?c=empresa&a=index">
                        <i class="fa fa-th"></i> <span>Empresa</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href="router.php?c=fatura&a=index">
                        <i class="fa fa-th"></i> <span>Fatura</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href="router.php?c=produto&a=index">
                        <i class="fa fa-th"></i> <span>Produtos</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
<<<<<<< HEAD
                    <a href="router.php?c=user&a=index">
                        <i class="fa fa-th"></i> <span>Users</span>
=======
                    <a href="router.php?c=iva&a=index">
                        <i class="fa fa-th"></i> <span>Ivas</span>
>>>>>>> 2fdecc442d67575f9c0a5ba0db78dffc34ae74ac
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            </ul>
        <!-- /.sidebar -->
    </aside>