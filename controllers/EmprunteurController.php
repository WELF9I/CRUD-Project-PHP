<?php
include_once('../models/Emprunteur.php');
include_once('../database/config.php');

class EmprunteurController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Emprunteur $emprunteur)
    {
        $query = "INSERT INTO Emprunteur(first_name, last_name, tel, email, cin) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);

        $params = array(
            $emprunteur->getFirstName(),
            $emprunteur->getLastName(),
            $emprunteur->getTel(),
            $emprunteur->getEmail(),
            $emprunteur->getCin()
        );

        return $stmt->execute($params);
    }

    function getEmprunteur($id)
    {
        $query = "SELECT * FROM Emprunteur WHERE idEmr = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($id));
        $array = $stmt->fetch();
        return $array;
    }

    function delete($idEmr)
    {
        $query = "DELETE FROM Emprunteur WHERE idEmr=?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute(array($idEmr));
    }

    function emprunteurList()
    {
        $query = "SELECT * FROM Emprunteur";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function updateEmprunteur(Emprunteur $emprunteur)
{
    $sql = "UPDATE Emprunteur SET first_name=?, last_name=?, tel=?, email=?, cin=? WHERE idEmr=?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(array(
        $emprunteur->getFirstName(),
        $emprunteur->getLastName(),
        $emprunteur->getTel(),
        $emprunteur->getEmail(),
        $emprunteur->getCin(),
        $emprunteur->getIdEmr()
    ));
}
}
?>
