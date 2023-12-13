<?php
include_once('../database/config.php');
include_once('../controllers/EmprunteurController.php');

$emprunteurController = new EmprunteurController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Supprimer'])) {
    if (isset($_POST['idEmr'])) {
        $idEmr = $_POST['idEmr'];
        $emprunteurController->delete($idEmr);
    }
    
}
header("Location: ListeMembres.php");
exit();
?>
