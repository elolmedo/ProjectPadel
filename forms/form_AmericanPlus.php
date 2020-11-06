<script>
    $(document).ready(function () {
        $('#btn_selc_tipo').on('click',function () {


            var formData = $('#difamericanplus').val();

           $.ajax({
               url: "../Ajax_reception/makePlus.php?indextorneo="+formData,
               type: "POST",
               dataType: "HTML",
               data: formData,
               cache: false,
               contentType: false,
               processData: false,
               success: function(data){
                   $('#maketournament').html(data);
               }

           })
        });
    });

</script>

<?php

    include ('../php_functions/tools.php');

    $db = connectDb();

    $sql = "SELECT * FROM padel_schema.typeoftournament
                    WHERE typetorneo = 'AMERICAN PLUS';";

    $torn_american_plus = pg_query($db, $sql);



    echo "<h4>Torneos American Plus</h4>";
    echo "<form name=\"NewAmericanPlus\" method=\"GET\">";
    echo '<h6>Selecciona uno de estos torneos American Plus</h6>';

    print "<select class='form-control' name='difamericanplus' id='difamericanplus' required='required'>";

    $arraytipostorneo = array();


    while ($row = pg_fetch_row($torn_american_plus)) {

        $arraytipostorneo[] = $row;
    }



    for ($x=0;$x<count($arraytipostorneo);$x++){

        $typetournament = new TypeOfTournament($arraytipostorneo[$x][0],$arraytipostorneo[$x][1],$arraytipostorneo[$x][2],$arraytipostorneo[$x][3],$arraytipostorneo[$x][4],$arraytipostorneo[$x][5],$arraytipostorneo[$x][6]);


        echo '<option  name="optiontypeT" value="'.$typetournament->getIdtype().'">
        
             Id: <br>'.$typetournament->getIdtype().
            ' Tipo: '.$typetournament->getTypetorneo().
            ' Players: '.$typetournament->getNumberofplayers().
            ' Campos de juego: '.$typetournament->getNumberofcourts().
            ' Descanso: '.$typetournament->isRest().
            ' Tiempo partido: '.$typetournament->getTimematchs().
            ' Duración: '.$typetournament->getDurationTournament().
            '</option>';

    }

    echo '</select>';
    echo '<br>';
    echo '<input type="button" id="btn_selc_tipo" class="btn btn-secondary"  value="Seleccionar Tipo Torneo">';
    echo '</form>';

?>




