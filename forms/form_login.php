<script type="text/javascript">

    $(document).ready(function() {

        $('#loginForm').on("submit", function(e){

            e.preventDefault();

            var formData = new FormData(document.getElementById("loginForm"));

            //Evitamos que se envie por defecto
            $.ajax({
                url: '../Ajax_reception/registro.php',
                type: 'post',
                datatype: "HTML",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    $('#respuesta').html(data);

                }

            });
        });
    });
</script>

    <!--<div id="mensaje" style="border:1px solid #CCC; padding:10px;"></div>-->
<h4>Registro en PadelTornament.com</h4>
<div class="col-md-5">
        <form method="post" id="loginForm" action="" accept-charset="utf-8">
            <div class="col-md-4 form-group">
                <label for="nick">Introduce el usuario: </label>
                <input type="text" id="nick" name="nick" value="" required="required" placeholder="Id usuario" autocomplete="off" maxlength="100">
                <label for="fullname">Nombre Completo: </label>
                <input type="text" id="fullname" name="fullname" value="" required placeholder="Nombre compl." autocomplete="off" maxlength="200">
                <label for="passwd">Introduce contraseña:</label>
                <input type="password" id="passwd" name="passwd" placeholder="Password" autocomplete="off" maxlength="16">
                <label for="email">Introduce el email: </label>
                <input type="email" id="email" name="email" value="Insertar correo" required="required" placeholder="Email" autocomplete="off" maxlength="200">
                <label for="phone">Introduce teléfono de contacto:</label>
                <input type="tel" id="phone" name="phone" value="" required="required" placeholder="Número telefono" autocomplete="off" maxlength="15">
                <br>
                <br>
                <input type="submit" id="btn_registro" name="btn_registro" class="btn btn-secondary" value="Registrarse">
            </div>
        </form>
</div>
<div id="respuesta" class="col-md-5">

</div>

