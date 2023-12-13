<?php
include_once('../database/config.php');
include_once('../controllers/EmprunteurController.php');

$emprunteurController = new EmprunteurController();

if (isset($_POST['idEmr'])) {
    $idEmr = $_POST['idEmr'];
    $emprunteur = $emprunteurController->getEmprunteur($idEmr);

    if ($emprunteur) {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["Sauvegarder"])) {
                
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $cin = $_POST['cin'];
                $Emprunteur = new Emprunteur($first_name, $last_name, $tel, $email, $cin,$idEmr);
                $emprunteurController->updateEmprunteur($Emprunteur);
               
                header("Location: ListeMembres.php");
                exit();
    }
    } else {
        echo "Emprunteur non trouvé.";
        exit();
    }
} else {
    echo "ID d'emprunteur non spécifié.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Emprunteur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Modifier Emprunteur</h1>

    <form action="Modifier_Emprunteur.php" method="post" class="form-group">
        <input type="hidden" name="idEmr" value="<?= $emprunteur['idEmr']; ?>">
        
        <label for="first_name">Prenom :</label>
        <input type="text" class="form-control" name="first_name" value="<?= $emprunteur['first_name']; ?>" required><br>

        <label for="last_name">Nom :</label>
        <input type="text" name="last_name" class="form-control" value="<?= $emprunteur['last_name']; ?>" required><br>

        <label for="tel">Telephone :</label>
        <input type="tel" class="form-control" name="tel" value="<?= $emprunteur['tel']; ?>" required><br>

        <label for="email">E-mail :</label>
        <input type="email" class="form-control" name="email" value="<?= $emprunteur['email']; ?>" required><br>

        <label for="cin">CIN :</label>
        <input type="text" class="form-control" name="cin" value="<?= $emprunteur['cin']; ?>" required><br>

        <input type="submit" class="btn btn-primary" name="Sauvegarder" value="Sauvegarder">

        
    </form>
    <form method="post" action="ListeMembres.php">
        <input type="submit" class="btn btn-secondary" value="Retour">
    </form>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
