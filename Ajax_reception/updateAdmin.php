<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 1/04/17
 * Time: 15:35
 */
include '/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/constant-file.php';

require PATHAPP."/php_functions/tools.php";
//Conexión, consultas e inserciones
$db = connectDb() or die(pg_last_error());


$usernick      = $_POST["user"];
$username      = $_POST["fullname"];
$userpassword    = $_POST["passwd"];
$userphone     = $_POST["phone"];
$usermail      = $_POST["email"];


//Comprobamos Max Character
if(strlen($usernick) > $GLOBALS['Max Chars nickUser']){

    die($GLOBALS['Fail maxCharnickUser']);
}


if(strlen($usermail) > $GLOBALS['Max Chars email']){

    die($GLOBALS['Fail maxCharemail']);
}
if(strlen($username) > $GLOBALS['Max Chars nameUser']){
    die($GLOBALS['Fail maxusername']);

}
if (strlen($userphone) > $GLOBALS['Max Chars phone']){
    die($GLOBALS['Fail maxcharphone']);
}

//nick en minúsculas
$usernameMinus = strtolower($usernick);
//Obtenemos la contraseña encryptada
$random = randomChars();
$valor = "07";
$salto = "$2y$".$valor."$".$random."$";
$passConSalto = crypt($userpassword,$salto);
//Creamos el array para actualizar los datos
//$arrayNewData = array   ('userid'=>$usernameMinus,'fullname'=>$username,
//                        'email'=>$usermail,'telf'=>$userphone,
//                        'password'=>$passConSalto);
//$arrayWhere = array ('userid'=>$usernameMinus);
//
//$resultado = pg_update($db,"padel_schema.users",$arrayNewData,$arrayWhere);

$user = returnUser($usernick);

$userid = $user->getId();

$id = intval($userid);



$sql =  "UPDATE padel_schema.users  SET (userid,fullname,email,telf,password) = 
                                    ('$usernameMinus','$username','$usermail','$userphone','$passConSalto')
                                    WHERE id = '$id'";


//$resultado = pg_query($db,$sql) or die(pg_last_error());

$result = pg_query($db,$sql) or die(pg_last_error());



$data = "";
if ($result){
    $data = $GLOBALS['Ok Update User'];
}else{
    $data = $GLOBALS['Fail Update User'];
};

return $data;



