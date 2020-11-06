<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 2/04/17
 * Time: 1:33
 */
include '/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/constant-file.php';
//session_start();
//

if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autorizado'){

    echo 'Mal inicio de sesión';
    header('Location: ../index.php');

}else{

    require ('/var/www/ProjectPadel/php_functions/sesiones.php');

    // Creamos el objeto usuario, a través de su nick único.
    session_start();
    $nick = $_SESSION['usuario'];
    $user = returnUser($nick);
    
    $userid = $user->getId();
    
    $id = intval($userid);
    
    
    if ($nick == $user->getUserid()){
        
        $db = connectDb();
        $sqlDeletePlayersByUser = "DELETE FROM padel_schema.players WHERE adminid='$id'";
        $sqlDeleteUser          = "DELETE FROM padel_schema.users WHERE id = '$id'";
        
        $resultDeletePlayers = pg_query($db,$sqlDeletePlayersByUser)or die($GLOBALS['Fail Elimination Players']);
        $resultDeleteUsers  = pg_query($db,$sqlDeleteUser) or die($GLOBALS['Fail Elimination User']);

        echo $GLOBALS['Ok Eliminate Players'];
        echo $GLOBALS['Ok Eliminate User'];

    }
}