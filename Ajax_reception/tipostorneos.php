<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 13/02/17
 * Time: 11:49
 */

$tipoformulario = $_POST['tipos'];

if ($tipoformulario == "American Plus"){
    include('./form_AmericanPlus.php');

}elseif ($tipoformulario == "AMERICAN TEAMS"){
    include('./form_AmericanTeams.php');
}