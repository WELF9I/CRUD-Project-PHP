<?php
include_once('../database/config.php');
include_once('../controllers/StockController.php');

$stockController = new StockController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Supprimer'])) {
    if (isset($_POST['idP'])) {
        $idP = $_POST['idP'];
        $stockController->delete($idP);
    }
    
}
header("Location: ListeMateriel.php");
exit();
?>
