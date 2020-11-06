<?php

    include ('../php_functions/tools.php');

    $db = connectDb();

    $sql = "SELECT * FROM padel_schema.typeoftournament
                WHERE typetorneo = 'AMERICAN TEAMS';";

    $torn_american_plus = pg_query($db, $sql);



    echo "<h4>Torneos American Plus</h4>";
    echo "<form name=\"NewAmericanPlus\" method=\"POST\">";
    echo '<h6>Selecciona uno de estos torneos American Teams</h6>';

    echo "<select class='form-control' name='dif_american_teams' id='dif_american_teams' required='required'>";

    $arraytipostorneo = array();


    while ($row = pg_fetch_row($torn_american_plus)) {

        $arraytipostorneo[] = $row;
    }

    for ($x=0;$x<count($arraytipostorneo);$x++){

         echo '<option>
                    Id: '.$arraytipostorneo[$x][0].
                    ' Tipo: '.$arraytipostorneo[$x][1].
                    ' Players: '.$arraytipostorneo[$x][2].
                    ' Campos de juego: '.$arraytipostorneo[$x][3].
                    ' Descanso: '.$arraytipostorneo[$x][4].
                    ' Tiempo partido: '.$arraytipostorneo[$x][5].
                    ' Duracion'.$arraytipostorneo[$x][6].
             '</option>';

    }

    echo '</select>';
    echo '<br>';
    echo '<input type="button" id="btn_selc_tipo" class="btn btn-secondary"  value="Seleccionar Tipo Torneo">';
    echo '</form>';

?>