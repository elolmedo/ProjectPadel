<?php
include '/home/badrom/WorkSpaces/PHP7.0/ProjectPadel/constant-file.php';

include_once PATHAPP."/Classes/users.php";
include PATHAPP."/Classes/tipotorneo.php";
include PATHAPP."/Classes/player.php";
include ('spanish.php');

global $contadorPlayer;

// Conexion a la base de datos
    function connectDb(){

        try{

            $connection = "host=localhost port=5432 dbname= user= password=";
            $db_connect = pg_pconnect($connection) or die ($GLOBALS['Fail Connect']);

        }catch (Exception $e){

            echo $e->getTraceAsString();
        }

        if(!$db_connect){
            $file_error = fopen("errorbd.txt");
            $error = "Error con la conexion en la base de datos ". date("d/m/Y h:i:sa") . "\n";

            fwrite($file_error,$error);
            fclose($file_error);
            print "<h2 style=\"color:red;\">Error de Conexió</h2>";
        }

        // Resultado de la conexion correcto, dos comprobaciones

        $comprobacion1 = pg_get_result($db_connect);
        echo pg_result_error($comprobacion1);

        $comprobacion2 = pg_connection_status($db_connect);
        if ($comprobacion2 === PGSQL_CONNECTION_OK){


        }else{
            $file_error = fopen("errorbd.txt");
            $error = "Error con la conexion en la base de datos ". date("d/m/Y h:i:sa") . "\n";

            fwrite($file_error,$error);
            fclose($file_error);
            print "<h2 style=\"color:red;\">Error de Conexió</h2>";
        }

        return $db_connect;
    }
    
    //Función para controlar los usuarios que se han creado y otorgar un ID automático.
    function countPlayers(&$contadorPlayers){

        $contadorPlayers += 1;
        return $contadorPlayers;

    }
    function inputPlayersAmericanTeam_8Players($array,$nombre,$sexo){

        for ($x=1; $x<=8; $x++){

            $array[$x] = ['nombre'=>$nombre];
            $array[$x] = ['sexo'=>$sexo];
        }

    }
    function randomChars(){
        //Lectura recomendada: https://mimentevuela.wordpress.com/2015/10/08/establecer-blowfish-como-salt-en-crypt-2/
        //TODO investigar función rand y revisar la web de arriba
        $chars = "abcdefghijklmnopqrstuvwxyz1234567890";
        $new_pass = '';

        for($i = 5; $i<35; $i++){
            $new_pass .= $chars[rand(5,35)];
        }

        return $new_pass;
    }

    function returnUser($nick){

        $db = connectDb();

        $sql = "SELECT * FROM padel_schema.users WHERE userid = '$nick'";

        $resultSql = pg_query($db,$sql);
        $arrayUser = pg_fetch_array($resultSql);

        $userObject = new User( $arrayUser['id'],
                                $arrayUser['userid'],
                                $arrayUser['password']
                                ,$arrayUser['fullname'],$arrayUser['email']
                                ,$arrayUser['telf']);

        return $userObject;


    }
    function returnPlayersTableforUser($nick){

            $user = returnUser($nick);

            $id_usuario = $user->getId();

            $db = connectDb() or die(pg_last_error());
            $sql = "";

            //Creamos los sql a raíz del filtro, en la primera carga de filtra por id, tal y como viene de la BD.
            if(isset($_POST['filtro'])){
                switch ($_POST['filtro']){
                    case "player_name":
                        $sql = "SELECT * FROM padel_schema.players WHERE adminid='$id_usuario'
                                ORDER BY name;";
                        break;
                    case "Id":
                        $sql = "SELECT * FROM padel_schema.players WHERE adminid='$id_usuario'
                                ORDER BY idplayer;";
                        break;
                    case "Sex":
                        $sql = "SELECT * FROM padel_schema.players WHERE adminid='$id_usuario'
                                ORDER BY sex;";
                        break;
                    case "phone":
                        $sql = "SELECT * FROM padel_schema.players WHERE adminid='$id_usuario'
                                ORDER BY phone;";
                        break;
                    case "email":
                        $sql = "SELECT * FROM padel_schema.players WHERE adminid='$id_usuario'
                                ORDER BY mail;";
                        break;
                }
            }else{

                $sql = "SELECT * FROM padel_schema.players WHERE adminid='$id_usuario';";
            }


            $resultSql = pg_query($db,$sql) or die('Error en Select de players por usuario, tools.php');
            $totalplayers = count(pg_fetch_array($resultSql));

        print "<h4>Lista de jugadores del usuario: '$nick'</h4>";
        print "<h5>Total de Jugadores: MAAALLL'$totalplayers' </h5>";
        print "<table class=\"table table-bordered\">";
        // Obtenemos los nombres de los campos
        print "<tr>";
        echo '<th>'.$GLOBALS['table player id'].'</th>';
        echo '<th>'.$GLOBALS['table player name'].'</th>';
        echo '<th>'.$GLOBALS['table player sex'].'</th>';
        echo '<th>'.$GLOBALS['table player email'].'</th>';
        echo '<th>'.$GLOBALS['table player phone'].'</th>';
        echo '<th>'.$GLOBALS['table player Tplays'].'</th>';
        echo '<th>'.$GLOBALS['table player Twins'].'</th>';
        echo '<th>'.$GLOBALS['table player Splays'].'</th>';
        echo '<th>'.$GLOBALS['table player Swins'].'</th>';
        echo '<th>'.$GLOBALS['table player admin'].'</th>';
        print "</tr>\n";

        // Obtenemos de datos en forma de array asociativo
        while ($row = pg_fetch_assoc($resultSql)){
            print "<tr>\n";
            // Examinamos cada campo
            foreach ($row as $col => $val) {
                print "<td> $val </td>\n";
            } // fin foreach
            print "</tr>\n\n";
        } // fin while
        print "</table>\n";




    }
    function returntypeTournament($idtype){

        $db = connectDb();

        $sql = "SELECT * FROM padel_schema.typeoftournament WHERE idtype = ".$idtype.";";

        $resultsql = pg_query($db,$sql);

        $arraysql = pg_fetch_row($resultsql);

        $typeoftournamet = new TypeOfTournament($arraysql[0],$arraysql[1],$arraysql[2],$arraysql[3],$arraysql[4]
            ,$arraysql[4],$arraysql[5],$arraysql[6],$arraysql[7]);

        return $typeoftournamet;

}
    function returnPlayersForSelect($idadmin){

        $db = connectDb();

        $sql = "SELECT name,mail FROM padel_schema.players WHERE adminid = '$idadmin'";

        $resultSql = pg_query($db,$sql);

        $arrayPlayers = pg_fetch_array($resultSql);

      echo '
            <table class="table table-bordered">
            <tr>
               <th>'.$GLOBALS['table player name'].'</th>
               <th>'.$GLOBALS['table player email'].'</th>
               <th>Selected</th>
            </tr>                 
      ';
        while($row = pg_fetch_assoc($resultSql)){
            print "<tr>";
            foreach ($row as $col => $val){
                print "<td>$val</td>";

            }

            print "<td><input type='checkbox' id='check_players'></td>";
            print "</tr>";
        }
        echo '</table>';
    }
?>
