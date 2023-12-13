<?php
include_once('../database/config.php');
include_once('../controllers/StockController.php');

$stockController = new StockController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['AjouterP'])) {
    $piece_name = $_POST['piece_name'];
    $qte = $_POST['qte'];

    $newMateriel = new Stock($piece_name, $qte);

    $stockController->insert($newMateriel);
    header("Location: ListeMateriel.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Matériel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>Ajouter Matériel</h1>

    <form action="Ajout_Materiel.php" method="post" class="form-group">
        <label for="piece_name">Nom de Pièce :</label>
        <input type="text" class="form-control" name="piece_name" required><br>

        <label for="qte">Quantité :</label>
        <input type="text" class="form-control" name="qte" required><br>

        <input type="submit" class="btn btn-success" name="AjouterP" value="Ajouter">
    </form>
    <a href="ListeMateriel.php"><input type="button" class="btn btn-secondary" value="Retour " name="Retour"></a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
