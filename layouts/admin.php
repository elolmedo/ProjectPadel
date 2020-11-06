
<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 24/03/17
 * Time: 0:12
 */
//TODO probar de finalizar php para luego continuar, dejar ya cargado los players de usuario, directamente.
//TODO ya que es un parte esencial de la app. Eliminar el botón. Investigar de crear las tablas con jquery o alguna
//TODO librería para editar los datos de esta.
//TODO Array listaPlayers
//include '/home/badrom/public_html/ProjectPadel/constant-file.php';


require (PATHAPP."/php_functions/tools.php");

//session_start();
//
    if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autorizado'){

        echo 'Mal inicio de sesión';
        header('Location: '.PATHAPP.'/indexphp');

    }else{

        require_once (PATHAPP."/php_functions/sesiones.php");
        
        // Creamos el objeto usuario, a través de su nick único.
        $nick = $_SESSION['usuario'];
        $user = returnUser($nick);

        if ($nick == $user->getUserid()) {

            //Comienza el código HTML
            echo '<h2>' . $GLOBALS['Titl AdminPage'] . ' ' . $user->getFirstname() . '</h2>
                     <div class="col-md-12">
                        <div class="col-md-5 jumbotron" style="margin: 2px;">
                            <h2 class="display-3">Perfil</h2>
                                <h3 id="idusuario">ID: ' . $user->getId() . '</h3>
                                <h3>UserId: ' . $user->getUserid() . '</h3>
                                <h3>Nombre Completo: ' . $user->getFirstname() . '</h3>
                                <h3>Email: ' . $user->getEmail() . '</h3>
                                <h3>Telf: ' . $user->getPhone() . '</h3>
                                <a class="btn btn-primary" href="salir.php" role="button">Cerrar Sesión</a>
                        </div>
    
                        <div class="col-md-5 jumbotron" style="margin: 2px">
                            <h2 class="display-3">Opciones</h2>
                            <a href="" id="btn_insJugadores" class="btn btn-primary">Insertar nuevos jugadores</a>
                            <!--<a href="" id="btn_listJugadores" class="btn btn-primary">Lista de jugadores Creados</a>-->
                            <a href="" id="btn_updAdmin" class="btn btn-primary">Modificar perfil</a>
                            <br>
                            <button class="btn btn-warning">Eliminar perfil</button>
                        </div>
                     </div>
                     
                    ';
        }
    }

?>


<script>
    $(document).ready(function() {
        $('#btn_insJugadores').on('click', function (){

            document.location.assign('pagina.php?indexmenu=insertplayers');
        });

        $('#btn_updAdmin').on('click',function(){
           document.location.assign('pagina.php?indexmenu=updateadmin');
        });

    });


</script>


