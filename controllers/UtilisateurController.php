<?php
include_once('../models/Utilisateur.php');
include_once('../database/config.php');

class UtilisateurController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Utilisateur $utilisateur)
    {
        $query = "INSERT INTO Utilisateur(username, password) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($query);

        $params = array($utilisateur->getUsername(), $utilisateur->getPassword());
        return $stmt->execute($params);
    }

    function getUtilisateur($id)
    {
        $query = "SELECT * FROM Utilisateur WHERE idU = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($id));
        $array = $stmt->fetch();
        return $array;
    }

    function delete($idU)
    {
        $query = "DELETE FROM Utilisateur WHERE idU=?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute(array($idU));
    }

    function utilisateurList()
    {
        $query = "SELECT * FROM Utilisateur";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function updateUtilisateur(Utilisateur $utilisateur)
    {
        $sql = "UPDATE Utilisateur SET username=?, password=? WHERE idU=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($utilisateur->getUsername(), $utilisateur->getPassword(), $utilisateur->getIdU()));
    }
}
?>
