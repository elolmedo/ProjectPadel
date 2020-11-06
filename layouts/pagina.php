<?php

include '/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/constant-file.php';

//Reanudamos la sesión
session_start();
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autorizado'){
    echo 'Mal inicio de sesión;';
    header('Location: ../index.php');
}else{

    $usernick = $_SESSION['usuario'];
    $userpass = $_SESSION['password'];
    require (PATHAPP."/php_functions/sesiones.php");

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <title>PadelTournament - Crea tus propios torneos de padel</title>
    <link rel="stylesheet" type="text/css" href="../css/menu.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                <li class="active"><a href="/ProjectPadel/layouts/pagina.php?indexmenu=home">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <!-- Titulo menu Torneo -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Torneos<span class="caret"></span>
                        <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-knight"></span></a>
                    <ul class="dropdown-menu forAnimate"  role="menu">
						<li><a href="#">Listar Torneos</a></li>
						<li class="divider"></li>
                        <li><a href="/ProjectPadel/layouts/pagina.php?indexmenu=maketournament">Crear Torneos</a></li>
                        <li class="divider">
                        <li><a href="#">Modificar Torneos</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Eliminar Torneos</a></li>
                        <li class="divider"></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li>
               
                <!-- Titulo Menu jugadores -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jugadores<span class="caret"></span>
                        <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                    	<li><a href="/ProjectPadel/layouts/pagina.php?indexmenu=listaplayers">Listar Jugadores</a><span style="font-size:16px;" class="pull-right hidden-xs showopacity"></span></a></li>
                    	<li class="divider">
                        <li ><a href="/ProjectPadel/layouts/pagina.php?indexmenu=insertplayers">Insertar Jugadores<span style="font-size:16px;" class="pull-right hidden-xs showopacity"></span></a></li>
                        <li class="divider">
                        <li><a href="#">Eliminar Jugadores</a></li>
                    </ul>
                </li>
                

                <!-- Empezar Torneo -->
                <li ><a href="#">Empezar Torneo<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-play-circle"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estadíticas Torneos<span class="caret"></span>
                        <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-signal"></span></a>
                    <ul class="dropdown-menu forAnimate" role="menu">
                        <li ><a href="#">Ver Torneos<span style="font-size:16px;" class="pull-right hidden-xs showopacity"></span></a></li>
                        <li class="divider"></li>
                        <li ><a href="#">Ver Puntuaciones<span style="font-size:16px;" class="pull-right hidden-xs showopacity"></span></a></li>
                    </ul>
                </li>
                 <!-- Menu Administrador -->
                <li class="dropdown">
                    <a href="/ProjectPadel/layouts/pagina.php?indexmenu=admin" class="dropdown-toggle" data-toogle="dropdown">Administrador<span class="caret"></span>
                        <span  style="font-size:16px;"  class="pull-right hidden-xs showopacity glyphicon glyphicon-wrench"></span></a>

                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="col-md-10">
        <?php

            $posicionmenu = isset($_GET['indexmenu']) ? $_GET['indexmenu'] : null;

        
            if ($posicionmenu == "home"){
                
                include('home.php');

            }else if($posicionmenu == "admin"){
                
                include('admin.php');

            }else if($posicionmenu == "maketournament"){
                
                include('maketournament.php');
                
            }else if($posicionmenu == "insertplayers") {

                include('insertplayers.php');
                
            }else if($posicionmenu == "listaplayers") {
                
                include 'tablaplayers.php';
            
                
            }elseif($posicionmenu="updateadmin"){
                
                    include('../forms/form_adminUpdate.php');
                    
            }else if($posicionmenu == "salir"){
                
                include('salir.php');
            }
        
        ?>

    </div>

</body>
</html>