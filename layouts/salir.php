<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 23/03/17
 * Time: 11:33
 */
require ('/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/php_functions/sesiones.php');

session_start();

//Desactivamos todas las conexiones
unset($_SESSION);

//Destruimos la sesiones
session_destroy();

//Redireccionamos a index
header('Location: ../index.php');
die();

?>

