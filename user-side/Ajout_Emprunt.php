<?php
include_once('../database/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Emprunter'])) {
    $idEmr= $_POST['idEmr'];
    $first_name= $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $cin = $_POST['cin'];
    $idP = $_POST['idP'];
    $piece_name= $_POST['piece_name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'emprunt</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Ajout_Emprunt.css">
</head>
<body>
    <div class="container">
        <form action="Ajout_Emprunt2.php" method="post" class="card" class="form-group">
            <div class="card-header">
                <div class="text-header">Ajouter un Emprunt</div>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="form-group">
                        <label for="last_name">Nom :</label>
                        <input type="text" class="form-control" name="last_name" value="<?= $last_name; ?>" disabled><br>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Prénom :</label>
                        <input type="text" class="form-control" name="first_name" value="<?= $first_name; ?>" disabled><br>
                    </div>
                    <div class="form-group">
                        <label for="tel">Téléphone :</label>
                        <input type="tel" class="form-control" name="tel" value="<?= $tel; ?>" disabled><br>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail :</label>
                        <input type="email" class="form-control" name="email" value="<?= $email; ?>" disabled><br>
                    </div>
                    <div class="form-group">
                        <label for="cin">CIN :</label>
                        <input type="text" class="form-control" name="cin" value="<?= $cin; ?>" disabled><br>
                    </div>
                    <div class="form-group">
                        <label for="nom_piece">Nom de la pièce:</label>
                        <input type="text" class="form-control" name="nom_piece" value="<?= $piece_name; ?>" disabled><br>
                    </div>
                    <div class="form-group">
                        <label for="quantite">Quantité :</label>
                        <input type="number" class="form-control" name="quantite" required><br>
                    </div>
                    <div class="form-group">
                        <label for="date_emprunt">Date d'emprunt :</label>
                        <input type="date" class="form-control" name="date_emprunt" required><br>
                    </div>
                    <div class="form-group">
                        <label for="heure_emprunt">Heure :</label>
                        <input type="time" class="form-control" name="heure_emprunt" required><br>
                    </div>
                    <div class="form-group">
                        <label for="duree">Durée :</label>
                        <input type="number" class="form-control" name="duree" placeholder="Heure(s)" required><br>
                    </div>
                   
                    <input type="hidden" name="idP" value="<?php echo $idP; ?>">
                    <input type="hidden" name="piece_name" value="<?php echo $idEmr; ?>">
                    <input type="hidden" name="idEmr" value="<?php echo $idEmr; ?>">
                    <input type="submit" class="btn btn-success" value="Emprunter" name="Emprunter2">
            </div>
        </form>
        <a href="Liste_Materiel.php" class="btn btn-secondary">Retour</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>