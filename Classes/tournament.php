<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 24/02/17
 * Time: 15:16
 */

include './tipotorneo.php';

class tournament extends tipotorneo{

    public $idtype          = 0;
    public $idtorneo        = 0;
    public $nombretorneo    = "";
    public $americanplus    = false;
    public $americanplayer  = false;
    public $dateoftour      = "";
    public $timestart       = "";
    public $timefinish      = "";
    
    //listas
    // Ojo revisar la clase SplFixedArray que nos permite establecer un maximo
    // de elementos en el array
    public $listapartidos = array();
    public $listaequipos = array();
    public $listaplayers = array();
}

function __construct(){
    
}

// cuando iniciemos el torneo deberemos pasar el entero del idtype por una metodo creado en
// la clase tipotorneo.php
// Ejemplo
// Este metedo getIType no esta declarado en esta clase, pero podemos usarlo.

// Funciones
// Por el id torneo determinaremos el numero de partidos que lo formaran

function get_size_tournament($idtype){

    $nuevotorneo = new $this;

    $nuevotorneo->getNumberMatchs($idtype);

}

