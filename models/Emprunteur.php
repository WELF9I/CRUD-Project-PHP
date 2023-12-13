<?php

class Emprunteur
{
    private $idEmr;
    private $first_name;
    private $last_name;
    private $tel;
    private $email;
    private $cin;

    public function __construct($first_name = "", $last_name = "", $tel = "", $email = "", $cin = "",$idEmr=null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->tel = $tel;
        $this->email = $email;
        $this->cin = $cin;
        $this->idEmr = $idEmr;
    }

    public function getIdEmr()
    {
        return $this->idEmr;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCin()
    {
        return $this->cin;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setCin($cin)
    {
        $this->cin = $cin;
    }
}
?>
