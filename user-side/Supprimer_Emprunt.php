<?php
include_once('../database/config.php');
include_once('../controllers/EmpruntController.php');
include_once('../controllers/StockController.php');

$empruntController = new EmpruntController();
$stockController = new StockController();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Supprimer'])) {
    if (isset($_POST['idE'])) {
        $idE = $_POST['idE'];
        $deleteSuccess=$empruntController->delete($idE);
    }
    if (isset($_POST['qte']) &&  isset($_POST['piece_name']) && isset($_POST['idP'])) {
        $idP = $_POST['idP'];
        $qteE = $_POST['qte'];
        $materiel = $stockController->getStock($idP);
        $qte = $materiel['qte'] + $qteE;
        $piece_name = $_POST['piece_name'];
        $Materiel = new Stock($piece_name, $qte, $idP);
        $stockController->updateStock($Materiel);
    }
    
    header("Location: home.php");
}
exit();

?>
