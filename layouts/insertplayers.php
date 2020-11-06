<?php

require (PATHAPP."/php_functions/tools.php");
session_start();

if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autorizado'){
    echo 'Mal inicio de sesión;';
    header('Location: ../index.php');
}else{

    $usernick = $_SESSION['usuario'];
    $userpass = $_SESSION['password'];
    require (PATHAPP."/php_functions/sesiones.php");
    

    
}
?>

<script>
    $(document).ready(function() {

        $('#bnt_2').on('click', function (e) {
            e.preventDefault();

            var name = $('#firstname').val();
            var hombre = $('#radiohombre').val();
            var mujer = $('#radiomujer').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var radiosex = '';
            var radioS;

            if(hombre == "on"){
                radioS='H';

            }else if(mujer == "on"){
                radioS='M';
            }
            radiosex = $('input:radio[name=radiosex]:checked').val();

           //var formData =" {'firstname':name,'radiosex':radiosex,'email':email,'phone':phone}";

            // No se porque, el elemento email del formulario no quiere enviarse, que cosas
            // Aprovechamos que tenemos que definir el sexo del jugador, para insertarle el correo desde aquí.
            var formData = new FormData(document.getElementById("form_InsertPlayer"));
            formData.append("radiosex",radiosex);
            formData.append("email",email);
            $.ajax({
                url: "/ProjectPadel/Ajax_reception/listaplayers.php",
                type: "POST",
                dataType: "HTML",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                   $('#players').append('<li class="list-group-item" contenteditable="true"><p>' + data + '</p></li>');

                }
            });
        });
    });

</script>

<h4>Insertar Jugadores para el </h4>
<div class="cold-md-4">
<form id="form_InsertPlayer">
    <div class="form-group col-md-4">
        <!-- Formulario -->
        <label for="firstname">Nombre Del Jugador</label>
        <input type="text" name="firstname" id="firstname" value="Insertar nombre" required="required"><br>
        <label for="radiosex">Sexo</label><br>
        <input type="radio" name="radiosex" id="radiohombre" value="H" required="required">Hombre<br>
        <input type="radio" name="radiosex" id="radiomujer" value="M" required="required">Mujer<br>
        <label for="email">Direccion de Correo:</label>
        <input type="email" id="email" required="required"><br>
        <label for="phone">Numero de telefono</label>
        <input type="tel" name="phone" id="phone" required="required"><br><br>
        
        <!-- Boton -->
        <button class="btn btn-primary" type="button" id="bnt_2" value="Insertar jugador">Insertar Jugador</button>
    </div>
</form>
<div class="col-md-4">
    <div id="lstJugadores ">
        <h4 id="titl_lst_vacia">Lista Vacia</h4>
        <ul id="players" class="list-group">

        </ul>

    </div>
</div>

   <!-- TODO Añadir la tabla de los usuarios ya creados con anterioridad -->