
<script>
    $(document).ready(function(){
        $('#updateAdmin').on('submit',function(e){
            e.preventDefault();

            var formData =  new FormData(document.getElementById("updateAdmin"));

            $.ajax({
                url: '../Ajax_reception/updateAdmin.php',
                type: 'post',
                dataype: "HTML",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    $('#resp_upduser').html(data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#btn_eliminar').on('click', function(){
            var response = confirm('Si eliminas este usuario se elimanarán todos los jugadores que haya creado, Esta Seguro');
            var x = '';
            if (response == true){
                
                $.post("/ProjectPadel/Ajax_reception/dropuser.php", function(data){
                   $('#resp_drpuser').html(data);
                });
                

            }else {
                
            }

        });
    });
</script>
<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 24/03/17
 * Time: 0:12
 */

//TODO Array listaPlayers

include '../php_functions/tools.php';
//session_start();
//
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autorizado'){

    echo 'Mal inicio de sesión';
    header('Location: ../index.php');

}else{

    require ('/home/badrom/public_html/ProjectPadel/php_functions/sesiones.php');
    
    // Creamos el objeto usuario, a través de su nick único.
    session_start();
    $nick = $_SESSION['usuario'];
    $user = returnUser($nick);

    if ($nick == $user->getUserid()){

        //Comienza el código HTML
        echo    '<h2>'.$GLOBALS['Titl AdminPage'].' '.$user->getFirstname().'</h2>
                 <div class="col-md-12">
                    <div class="col-md-5 jumbotron" style="margin: 2px;">
                        <form method="post" id="updateAdmin" action="" accept-charset="utf-8">
                            <label for="user">Introduce el nick: </label>
                            <input type="text" id="user" name="user" value="'.$user->getUserid().'" required="required" placeholder="Usuario" autocomplete="off" maxlength="100">
                            <label for="passwd">Introduce la contraseña: </label>
                            <input type="password" id="passwd" name="passwd" placeholder="Password" autocomplete="off" maxlength="16">
                            <label for="fullname">Nombre Completo: </label>
                            <input type="text" id="fullname" name="fullname" value="'.$user->getFirstname().'" required placeholder="Nombre compl." autocomplete="off" maxlength="200">
                            <label for="email">Introduce el email: </label>
                            <input type="email" id="email" name="email" value="'.$user->getEmail().'" required="required" placeholder="Email" autocomplete="off" maxlength="200">
                            <label for="phone">Introduce teléfono de contacto:</label>
                            <input type="tel" id="phone" name="phone" value="'.$user->getPhone().'" required="required" placeholder="Número telefono" autocomplete="off" maxlength="15">
                            <br>
                            <br>
                            <input type="submit" name="registro" class="btn btn-primary" value="Actualizar los datos">
                    </div>

                    <div class="col-md-6 jumbotron" style="margin: 2px">
                        <h2 class="display-3">Opciones</h2>
                        <button id="btn_eliminar" class="btn btn-warning">Eliminar perfil</button>
                        <div class="col-md-3" id="resp_upduser">
                             
                        </div>
                        <div class="col-md-3" id="resp_drpuser">
                        
                        </div>  
                        
                    </div>
                 </div>
                 
                
                ';
    }

}

?>
<div class="col-md-12">
    <div id="ListaJugadores">
        <h4 id="titl_list_Players_usuarios">Lista Jugadores</h4>
        <?php
        $idusuario = $_SESSION['usuario'];

        returnPlayersTableforUser($idusuario);
        ?>
    </div>
</div>



