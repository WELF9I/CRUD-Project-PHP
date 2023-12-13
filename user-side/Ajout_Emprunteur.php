<?php
include_once('../database/config.php');
include_once('../controllers/EmprunteurController.php');

$emprunteurController = new EmprunteurController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["AjouterE"])) {
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $cin = $_POST['cin'];

    $nouvelEmprunteur = new Emprunteur($first_name, $last_name, $tel, $email, $cin);

    $emprunteurController->insert($nouvelEmprunteur);

    header("Location: ListeMembres.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Emprunteur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter Emprunteur</h1>
    <form action="Ajout_Emprunteur.php" method="post" class="form-group">
        <label for="first_name">Prenom :</label>
        <input type="text" class="form-control" name="first_name" required><br>

        <label for="last_name">Nom :</label>
        <input type="text" class="form-control" name="last_name" required><br>

        <label for="tel">Telephone :</label>
        <input type="tel" class="form-control" name="tel" required><br>

        <label for="email">E-mail :</label>
        <input type="email" class="form-control" name="email" required><br>

        <label for="cin">CIN :</label>
        <input type="text" class="form-control" name="cin" required><br>

        <input type="submit" class="btn btn-primary" name="AjouterE" value="Ajouter">
    </form>
    <a href="ListeMembres.php" class="btn btn-secondary">Retour</a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
