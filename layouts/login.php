<?php

include '/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/constant-file.php';

require_once (PATHAPP."/php_functions/sesiones.php");

//Iniciamos la sesión
session_start();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <title>PadelTournament - Crea tus propios torneos de padel</title>
    <link rel="stylesheet" type="text/css" href="../css/menu.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="active"><a href="/ProjectPadel/layouts/login.php?indexmenu=home">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <!-- Login -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login / Acces<span class="caret"></span>
                            <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li><a href="/ProjectPadel/layouts/login.php?indexmenu=access">Acceso</a></li>
                        <li><a href="/ProjectPadel/layouts/login.php?indexmenu=login">Login</a></li>
                    </ul>

                </li>
                
            </ul>
        </div>
    </div>
</nav>


    <div class="col-md-9">
        
        <?php

            $posicionmenu = isset($_GET['indexmenu']) ? $_GET['indexmenu'] : null;

            if ($posicionmenu == "home"){

                include('../layouts/home.php');

            }else if($posicionmenu == "access"){

                include('../forms/form_access.php');

            }else if($posicionmenu == "login"){

                include('../forms/form_login.php');
            }

        ?>

</div>

</body>
</html>
