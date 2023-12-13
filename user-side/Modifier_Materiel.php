<?php
include_once('../database/config.php');
include_once('../controllers/StockController.php');

$stockController = new StockController();

if (isset($_POST['idP'])) {
    $idP = $_POST['idP'];
    $materiel = $stockController->getStock($idP);

    if ($materiel) {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["Sauvegarder"])) {
            $piece_name = $_POST['piece_name'];
            $qte = $_POST['qte'];
            $Materiel = new Stock($piece_name, $qte,$idP);
            $stockController->updateStock($Materiel);
            header("Location: ListeMateriel.php");
            exit();
        }
    } else {
        echo "Materiel non trouvé.";
        exit();
    }
} else {
    echo "ID de materiel non spécifié.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Materiel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>Modifier Materiel</h1>

    <form action="Modifier_Materiel.php" method="post" class="form-group">
        <input type="hidden" name="idP" value="<?= $materiel['idP']; ?>">
        
        <label for="piece_name">Nom de Piece :</label>
        <input type="text" class="form-control" name="piece_name" value="<?= $materiel['piece_name']; ?>" required><br>

        <label for="qte">Quantité :</label>
        <input type="text" class="form-control" name="qte" value="<?= $materiel['qte']; ?>" required><br>

        <input type="submit" class="btn btn-success" name="Sauvegarder" value="Sauvegarder">
    </form>
    <form method="post" action="ListeMateriel.php">
        <input type="submit" class="btn btn-secondary" value="Retour" name="Retour">
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
