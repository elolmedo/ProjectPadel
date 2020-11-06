<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 24/02/17
 * Time: 14:19
 */


class TypeOfTournament
{

    var $idtype = 0;
    var $typetorneo = "";
    var $numberofplayers = "";
    var $numberofcourts = "";
    var $rest = false;
    var $numberofmarchs = "";
    var $timematchs = "";
    var $duration = "";

    function __construct($nid,$ntype,$nNplayers,$nNcourts,$nrest,$nNmatchs,$ntime,$nduration)
    {
        $this->idtype = $nid;
        $this->typetorneo = $ntype;
        $this->numberofplayers = $nNplayers;
        $this->numberofcourts = $nNcourts;
        $this->rest = $nrest;
        $this->numberofmarchs = $nNmatchs;
        $this->timematchs = $ntime;
        $this->duration = $nduration
        
        ;
    }


    //Getters
    function getDurationTournament()
    {

        return $this->duration;
    }

    /**
     * @return int
     */
    public function getIdtype()
    {
        return $this->idtype;
    }

    /**
     * @return string
     */
    public function getTypetorneo()
    {
        return $this->typetorneo;
    }

    /**
     * @return string
     */
    public function getNumberofplayers()
    {
        return $this->numberofplayers;
    }

    /**
     * @return string
     */
    public function getNumberofcourts()
    {
        return $this->numberofcourts;
    }

    /**
     * @return string
     */
    public function getTimematchs()
    {
        return $this->timematchs;
    }

    /**
     * @return boolean
     */
    public function isRest()
    {
        return $this->rest;
    }


}
        