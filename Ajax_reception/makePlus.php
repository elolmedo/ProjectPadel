<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 2/04/17
 * Time: 13:52
 */


include '/home/badrom/WorkSpaces/PHP7.0//ProjectPadel/php_functions/tools.php';

$idtipotorneo = $_GET['indextorneo'];

$id = intval($idtipotorneo);

$newtype = returntypeTournament($id);

session_start();
$id = $_SESSION['usuario'];

$admin = returnUser($id);

$idadmin = $admin->getId();

echo    '<h3>Creación de torneo</h3>
            <h4>Modalidad: '.$newtype->getTypetorneo().'</h4>
            <h4>Jugadores Necesarios: '.$newtype->getNumberofplayers().'</h4>
            <h4>Número de pistas: '. $newtype->getNumberofcourts().'</h4>
            <div class="col-md-5">
                <h3>Lista Jugadores Disponibles</h3>
                '.returnPlayersForSelect($idadmin).'
            </div>
            <div class ="col-md-5">
                <h3>Jugadores Seleccionados</h3>
            </div>

            ';



