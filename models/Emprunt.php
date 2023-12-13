<?php

class Emprunt
{
    private $idE;
    private $idEmr;
    private $idP;
    private $dateE;
    private $dateR;
    private $heureE;
    private $heureR;
    private $duree;
    private $qte;

    public function __construct($idE=null,$idEmr=null,$idP=null,$dateE="", $heureE="", $dateR="", $heureR="", $duree="",$qte="")
    {   $this->idE = $idE;
        $this->idEmr = $idEmr;
        $this->idP = $idP;
        $this->dateE = $dateE;
        $this->heureE = $heureE;
        $this->dateR = $dateR;
        $this->heureR = $heureR;
        $this->duree = $duree;
        $this->qte = $qte;  
    }

    public function getIdE()
    {
        return $this->idE;
    }

    public function getIdEmr()
    {
        return $this->idEmr;
    }

    public function getIdP()
    {
        return $this->idP;
    }

    public function getDateE()
    {
        return $this->dateE;
    }

    public function getDateR()
    {
        return $this->dateR;
    }

    public function getHeureE()
    {
        return $this->heureE;
    }

    public function getHeureR()
    {
        return $this->heureR;
    }

    public function getDuree()
    {
        return $this->duree;
    }
    public function getQte()
    {
        return $this->qte;
    }


    public function setDateE($dateE)
    {
        $this->dateE = $dateE;
    }

    public function setDateR($dateR)
    {
        $this->dateR = $dateR;
    }

    public function setHeureE($heureE)
    {
        $this->heureE = $heureE;
    }

    public function setHeureR($heureR)
    {
        $this->heureR = $heureR;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
    }
    public function setQte($qte)
    {
        $this->duree = $qte;
    }
}
?>
