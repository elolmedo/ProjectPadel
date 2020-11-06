<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 27/03/17
 * Time: 20:32
 */




//Nombre de Usuario

//$GLOBALS['Session usernick'] = $usernick;

//Carácteres máximos
$GLOBALS['Max Chars nickUser']      = "100";
$GLOBALS['Max Chars nameUser']      = "200";
$GLOBALS['Max Chars passwd']        = "16";
$GLOBALS['Max Chars email']         = "200";
$GLOBALS['Max Chars phone']         = "15";

//Errores
$GLOBALS['Fail Connect']            = "Fallo de conexión";
$GLOBALS['Fail maxCharnickUser']    = 'El nombre de usuario no puede tener más de '.$GLOBALS['Max Chars nickUser'].' caracteres';
$GLOBALS['Fail maxCharpasswd']      = 'La contraseña no puede tener más de ' .$GLOBALS['Max Chars passwd'].' caracteres';
$GLOBALS['Fail maxCharemail']       = 'El email no puede tener más de '.$GLOBALS['Max Chars email'].' caracteres';
$GLOBALS['Fail maxusername']        = 'El nombre de usuario no puede tener más de '.$GLOBALS['Max Chars nameUser'].' caracteres';
$GLOBALS['Fail maxcharphone']       = 'El telefono no puede tener más de '.$GLOBALS['Max Chars phone'].' caracteres';
$GLOBALS['Fail IData loginForm']    = 'Formulario de registro!! Debes introducir datos válidos';
$GLOBALS['Fail Input User']         = 'Ya existe una usuario con el nick, debes introducir un nombre de usuario válido';
$GLOBALS['Fail Input Email']        = 'Ya existe una usuario con el email, debes introducir un email válido';
$GLOBALS['Fail INTO DB loginFrom']  = 'Error en formulario de registro, al insertar los datos en la bd';
$GLOBALS['Fail Update User']        = 'Error al actualizar los datos del usuarios';
$GLOBALS['Fail Function returnUser']= 'Error en la función returnUser';
$GLOBALS['Fail Elimination Players']= 'Error al eliminar los jugadores';
$GLOBALS['Fail Elimination User']   = 'Error eliminado el usuario';

//Mensajes OK
$GLOBALS['Ok Update User']          = 'Usuario Modificado';
$GLOBALS['Ok Eliminate Players']    = 'Jugadores Eliminados';
$GLOBALS['Ok Eliminate User']       = 'Usuario Eliminado';

//Títulos h2
$GLOBALS['Titl AdminPage']         = 'Menú de Administrador';

//Tablas
//Tabla Jugadores
$GLOBALS['table player id']         = "Id";
$GLOBALS['table player name']       = "Nombre";
$GLOBALS['table player sex']        = "Sexo";
$GLOBALS['table player email']      = "Correo";
$GLOBALS['table player phone']      = "Telf";
$GLOBALS['table player Tplays']     = "Trn. Jug.";
$GLOBALS['table player Twins']     = "Trn. Gan.";
$GLOBALS['table player Splays']     = "Set Jug.";
$GLOBALS['table player Swins']     = "Set Gan.";
$GLOBALS['table player admin']     = "Id Admin";

//Filtros
//Filtro para lista jugadores
$GLOBALS['filter player id']         = "Identificador";
$GLOBALS['filter player name']         = "Nombre Player";
$GLOBALS['filter player sex']         = "Sexo";
$GLOBALS['filter player phone']         = "Telefono";
$GLOBALS['filter player email']         = "Correo";


//Formulario login
$GLOBALS['titulo form acces']   = "Entra con tu Jugador";
$GLOBALS['usuario login']       = "Usuario: ";
$GLOBALS['secret login']        = "Pass: ";






