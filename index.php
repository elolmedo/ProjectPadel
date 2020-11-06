<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 27/02/17
 * Time: 20:30
 */
session_start();

error_reporting(E_ALL);

if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autorizado'){
    include 'layouts/pagina.php';
    die();

}else{
    include('layouts/login.php');
    die();
}