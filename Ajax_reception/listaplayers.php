<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 23/02/17
 * Time: 22:53
 */
    //include '/home/badrom/public_html/ProjectPadel/Classes/player.php';
    include '/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/php_functions/tools.php';
    include '/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/constant-file.php';
    
    $db = connectDb() or die(pg_last_error());

    $nombre = $_POST['firstname'];
    $sexo   = $_POST['radiosex'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];

    $listaDePlayers = array();

      //Creamos usuario que esta en la sesión y recuperamos su identificador númerico
    session_start();
    $nick = $_SESSION['usuario'];
    $user = returnUser($nick);

    $userid = $user->getId();

    $sqlNickPlayers         = "SELECT name FROM padel_schema.players WHERE name = '$nombre';";
    $sqlNickEmailPlayers    = "SELECT mail FROM padel_schema.players WHERE mail = '$email';";

    $resultNickPlayers      = pg_query($db,$sqlNickPlayers) or die(pg_errormessage($db));
    $resultNickEmailPlayers = pg_query($db,$sqlNickEmailPlayers) or die (pg_errormessage($db));

    $arrayNickPlayers = pg_fetch_array($resultNickPlayers);
    $arrayNickEmailPlayers = pg_fetch_array($resultNickEmailPlayers);


    //Se crea el Player, y lo añadimos al Array.
    //Se guarda en la bd. TABLE padel_schema.players

    if ($nombre == $arrayNickPlayers['name']) {

        die('el nick de player ya existe');

    } else if ($email == $arrayNickEmailPlayers['email']) {

        die('el email insertado ya existe o esta vacío');

    } else {

        $player = new Player($nombre, $sexo, $phone, $email, 0, 0, 0, 0, $userid);

        $plid = $player->getIdplayer();
        $plname = $player->getnombre();
        $plsex = $player->getSexo();
        $plemail = $player->getEmail();
        $plphone = $player->getPhone();
        $pltourPlay = $player->getTournamentPlays();
        $pltourWin = $player->getWintournaments();
        $plsetplay = $player->getSetplayed();
        $plsetwin = $player->getSetwinner();
        $pladminid = $player->getAdminid();

        $sql = "INSERT INTO padel_schema.players(name,sex,mail,phone,numbertorneosparticipate,wintournaments,setplayed,setwinner,adminid)
                VALUES  ('$plname','$plsex','$plemail','$plphone','$pltourPlay','$pltourWin','$plsetplay','$plsetwin','$pladminid')";


        pg_query($db, $sql);

        echo '
                    PlayerName: ' . $player->getnombre() . ' 
                    Sexo: ' . $player->getSexo() . '
                    Correo: ' . $player->getEmail() . '
                    Telf:   ' . $player->getPhone() . '
    
                    
                ';

    }
?>