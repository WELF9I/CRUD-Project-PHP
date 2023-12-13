<?php
include_once('../models/Emprunt.php');
include_once('../models/Stock.php');
include_once('../models/Emprunteur.php');
include_once('../database/config.php');

class EmpruntController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Emprunt $emprunt)
    {
        $query = "INSERT INTO Emprunt(idE,idEmr, idP, dateE, heureE, dateR, heureR, duree,qte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);

        $params = array(
            $emprunt->getIdE(),
            $emprunt->getIdEmr(),
            $emprunt->getIdP(),
            $emprunt->getDateE(),
            $emprunt->getHeureE(),
            $emprunt->getDateR(),
            $emprunt->getHeureR(),
            $emprunt->getDuree(),
            $emprunt->getQte()
        );

        return $stmt->execute($params);
    }
    function getEmprunt($id)
    {
        $query = "SELECT * FROM Emprunt WHERE idE = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($id));
        $array = $stmt->fetch();
        return $array;
    }

    function delete($idE)
    {
        $query = "DELETE FROM Emprunt WHERE idE=?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute(array($idE));
    }

    function empruntList()
    {
        $query = "SELECT * FROM Emprunt";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function updateEmprunt(Emprunt $emprunt)
    {
        $sql = "UPDATE Emprunt SET idEmr=?, idP=?, dateE=?, dateR=?, heureE=?, heureR=?, duree=?,qte=? WHERE idE=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            $emprunt->getIdEmr(),
            $emprunt->getIdP(),
            $emprunt->getDateE(),
            $emprunt->getDateR(),
            $emprunt->getHeureE(),
            $emprunt->getHeureR(),
            $emprunt->getDuree(),
            $emprunt->getIdE(),
            $emprunt->getQte()
        ));
    }
}
?>
