<?php

class Stock
{
    private $idP;
    private $piece_name;
    private $qte;
    public function __construct($piece_name="", $qte="",$idP=null)
    {
        $this->piece_name = $piece_name;
        $this->qte = $qte;
        $this->idP = $idP;
    }
    public function getIdP()
    {
        return $this->idP;
    }

    public function getPieceName()
    {
        return $this->piece_name;
    }

    public function getQte()
    {
        return $this->qte;
    }

    public function setPieceName($piece_name)
    {
        $this->piece_name = $piece_name;
    }

    public function setQte($qte)
    {
        $this->qte = $qte;
    }
}
?>
