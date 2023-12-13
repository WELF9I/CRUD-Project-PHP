<?php
include_once('../models/Stock.php');
include_once('../database/config.php');

class StockController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Stock $stock)
    {
        $query = "INSERT INTO Stock(piece_name, qte) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($query);

        $params = array($stock->getPieceName(), $stock->getQte());
        return $stmt->execute($params);
    }

    function getStock($id)
    {
        $query = "SELECT * FROM Stock WHERE idP = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($id));
        $array = $stmt->fetch();
        return $array;
    }

    function delete($idP)
    {
        $query = "DELETE FROM Stock WHERE idP=?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute(array($idP));
    }

    function stockList()
    {
        $query = "SELECT * FROM Stock";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function updateStock(Stock $stock)
    {
        $sql = "UPDATE Stock SET piece_name=?, qte=? WHERE idP=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($stock->getPieceName(), $stock->getQte(), $stock->getIdP()));
    }
}
?>
