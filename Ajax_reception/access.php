<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 21/03/17
 * Time: 14:14
 */


include '/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/constant-file.php';
require (PATHAPP."/php_functions/tools.php");

$db = connectDb() or die(pg_last_error());

$username = $_POST["user"];
$upass = $_POST["passwd"];


if(strlen($username) > $GLOBALS['Max Chars nameUser']){

    die($GLOBALS['Fail maxusername']);
}

if(strlen($upass) > $GLOBALS['Max Chars passwd']){

    die($GLOBALS['Fail maxCharpasswd']);
}

$usernameMinus = strtolower($username);

$sqlUsersInDb =    "SELECT * FROM padel_schema.users WHERE userid ='$usernameMinus'";

$resultUser = pg_query($db, $sqlUsersInDb);

$arrayUser = pg_fetch_array($resultUser);

$nick = $arrayUser["userid"];
$userid = $arrayUser["id"];
$pass = $arrayUser["password"];

if($nick == $usernameMinus and password_verify($upass,$pass)){

    session_start();
    $_SESSION['usuario'] = $nick;
    $_SESSION['estado'] = 'Autorizado';
    $_SESSION['password'] = $pass;
    $_SESSION['userid'] = $userid;


    echo    '<script>
                document.location.href = "pagina.php?indexmenu=admin";
            </script>';

}else if ($nick != $usernameMinus || $username == "" || $upass == "" || !password_verify($upass,$pass)){
    die ('<script>$(".acceso").val("");</script>
          Los datos de acceso son incorrectos');
}else{
    die('Error!!!');
}
