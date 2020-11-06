<?php
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
        echo '<div class="col-md-12">
                        <div id="ListaJugadores">
                            <h4 id="titl_list_Players_usuarios">Lista Jugadores</h4>
                            <div id="filtros">
                                Selecciona alguno de los filtros para ordenar los productos
                                <form action="" method="post">
                                    <select name="filtro">
                                        <option value="player_name">'.$GLOBALS['filter player name'].'</option>
                                        <option value="Id">'.$GLOBALS['filter player id'].'</option>
                                        <option value="Sex">'.$GLOBALS['filter player sex'].'</option>
                                        <option value="phone">'.$GLOBALS['filter player phone'].'</option>
                                        <option value="email">'.$GLOBALS['filter player email'].'</option>
                                    </select>
                                    <button type="submit">Filtrar</button>
                                </form>
                            </div>
                        </div>
                    </div>';
        
        returnPlayersTableforUser($nick);
    }
}

