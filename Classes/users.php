<?php
/**
 * Created by PhpStorm.
 * User: badrom
 * Date: 24/02/17
 * Time: 14:04
 */

class User{

    var $id = 0;
    var $userid = "";
    protected $passwd = "";
    var $firstname = "";
    var $email = "";
    var $phone = 0;

    var $listajugadores = array();


    function __construct($nid,$nuserid,$npasswd,$nfisrt,$nemail,$nphone){

        $this->id       = $nid;
        $this->userid   = $nuserid;
        $this->passwd   = $npasswd;
        $this->firstname    = $nfisrt;
        $this->email    =  $nemail;
        $this->phone    = $nphone;

    }

    
    //Getters
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return array
     */
    public function getListajugadores()
    {
        return $this->listajugadores;
    }

    //Setters
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setListaJugadores($arrayJugadores){

        $this->listajugadores = $arrayJugadores;
    }

    public function getnamesfromlist($arrayJugadores){

        echo $arrayJugadores['nombre'];

    }

    
}