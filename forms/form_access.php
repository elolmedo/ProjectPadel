<script>
    $(document).ready(function() {
        $('#accesoForm').on('submit', function (e) {

            e.preventDefault();

            var formData = new FormData(document.getElementById("accesoForm"));

            $.ajax({
                url: "../Ajax_reception/access.php",
                type: "POST",
                dataType: "HTML",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#respuesta').html(data);
                }
            });
        });
    });
</script>

<?php


    require (PATHAPP."/php_functions/spanish.php");

    echo '<div class="col-md-12>
            <div class="col-md-9 jumbotron" id="login">
                <h1> '. $GLOBALS['titulo form acces'] .'</h1>
                <form method="POST" id="accesoForm" action="" accep-charset="utf-8">
                    <label for="user">'.$GLOBALS['usuario login'].'</label>
                    <input type="text" id="user" name="user" value="Insertar correo o nombre de usuario" required="required" placeholder="Usuario" autocomplete="off" maxlength="100">
                    <label for="passwd">'.$GLOBALS['secret login'].'</label>
                    <input type="password" id="passwd" name="passwd" placeholder="Password" autocomplete="off" maxlength="16">
                    <br>
                    <input type="submit" name="registro" class="btn btn-primary" id="login-submit" value="Registrarse">
                    </form>
            <div id="respuesta" class="col-md-id">
            
            </div>
 
    ';   
?>

<!-- <div class="col-md-9 jumbotron" id="login"> -->
<!-- 		<h1>Entra con tu Jugador</h1> -->
<!--         <form method="POST" id="accesoForm" action="" accept-charset="utf-8"> -->
<!--             <label for="user">Usuario:</label> -->
<!--             <input type="text" id="user" name="user" value="Insertar correo o nombre de usuario" required="required" placeholder="Usuario" autocomplete="off" maxlength="100"> -->
<!--             <label for="passwd">Password: </label> -->
<!--             <input type="password" id="passwd" name="passwd" placeholder="Password" autocomplete="off" maxlength="16"> -->
<!--             <br> -->
<!--             <input type="submit" name="registro" class="btn btn-primary" id="login-submit" value="Registrarse"> -->
<!--         </form> -->
<!-- </div> -->
<!-- <div id="respuesta" class="col-md-id"> -->

<!-- </div> -->

