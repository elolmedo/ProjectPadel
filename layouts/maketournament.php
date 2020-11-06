<head>
<script>
    $(document).ready(function () {

        $('#btn_selc_tipo_torneo').on('click',function () {

            var tipo = $('#sel_tipo').val();

            if (tipo == "American Plus")
            {
                $.post("/ProjectPadel/forms/form_AmericanPlus.php", function(htmlexterno){
                    $('#form_torneos').html(htmlexterno);
                });

            }
            else if(tipo == "American Teams")
            {

                $.post("/ProjectPadel/forms/form_AmericanTeams.php", function(htmlexterno){
                    $('#form_torneos').html(htmlexterno);
                });            }

        });

    });


</script>
</head>
<body>
<div id="formulario_tipoTorneo" class="col-md-4">
    <h4>Creacion de nuevo torneo</h4>
    <form name="Form_tipoTorneo" style="display:inline">
        <h6>Selecciona el tipo de torneo</h6>
        <select class="form-control" id="sel_tipo" name="seltipo" required="required">
            <option>American Plus</option>
            <option>American Teams</option>
        </select>
        <br>
        <input  class="btn btn-secondary" type="button" name="submit" id="btn_selc_tipo_torneo" value="Elegir Tipo Torneo">
    </form>
</div>
<div id="form_torneos" class="col-md-4">


</div>

<div class="col-md-10 container-fluid" id="maketournament">


</div>
</body>