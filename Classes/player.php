<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 23/02/17
 * Time: 20:42
 */
class Player {

    var $idplayer = 0;
    var $nombre = "";
    var $Sexo = '';
    var $phone = 0;
    var $email = '';
    var $setplayed = 0;
    var $setwinner = 0;
    var $tournamentPlays = 0;
    var $wintournaments = 0;
    var $adminid = 0;
    var $level = 0;

    // Constructor principal
    function __construct($nnombre,$nsexo,$nphone,$nemail,$nset,$nsetwin,$ntournamentsplay,$nwintourn, $nadminid, $nlevel)
    {
        $this->nombre   = $nnombre;
        $this->Sexo     = $nsexo;
        $this->phone    = $nphone;
        $this->email    = $nemail;
        $this->setplayed = $nset;
        $this->setwinner = $nsetwin;
        $this->tournamentPlays = $ntournamentsplay;
        $this->wintournaments = $nwintourn;
        $this->adminid = $nadminid;
        $this->level = $nlevel;
        
    }

    // Getters

    public function getIdplayer()
    {
        return $this->idplayer;
    }
    public function getnombre(){

        return $this->nombre;
    }
    public function getAdminid()
    {
        return $this->adminid;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getTournamentPlays()
    {
        return $this->tournamentPlays;
    }
    public function getSetplayed()
    {
        return $this->setplayed;
    }
    public function getSetwinner()
    {
        return $this->setwinner;
    }
    public function getWintournaments()
    {
        return $this->wintournaments;
    }
    public function getSexo()
    {
        return $this->Sexo;
    }
    
    
}