<?php
include_once('../database/config.php');
include_once('../controllers/EmpruntController.php');
include_once('../controllers/StockController.php');

$empruntController = new EmpruntController();
$stockController = new StockController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Emprunter2'])) {

        $idE = NULL;
        $idEmr = $_POST['idEmr'];
        $idP =$_POST['idP'];
        $last_name =$_POST['last_name'];
        $first_name =$_POST['first_name'];
        $tel =$_POST['tel'];
        $email =$_POST['email'];
        $cin =$_POST['cin'];
        $dateE = $_POST["date_emprunt"];
        $heureE = $_POST["heure_emprunt"];
        $heureE = $heureE . ":00";
        $duree = $_POST["duree"];
        $qteE = $_POST["quantite"];

        $materiel = $stockController->getStock($idP);
        $qte = $materiel['qte'] - $qteE;
        $piece_name=$materiel['piece_name'];
        $Materiel = new Stock($piece_name, $qte, $idP);
        $stockController->updateStock($Materiel);
        $dateEmprunt = new DateTime($dateE . ' ' . $heureE);
        $dateEmprunt->add(new DateInterval('PT' . $duree . 'H'));

        $dateR = $dateEmprunt->format('Y-m-d');
        $heureR = $dateEmprunt->format('H:i:s');

        $emprunt = new Emprunt($idE, $idEmr, $idP, $dateE, $heureE, $dateR, $heureR, $duree, $qteE);
        try{
            $insertSuccess=$empruntController->insert($emprunt);
            if($insertSuccess){
            echo '<script>';
            echo 'alert("Emprunt effectué avec succès!");';
            echo 'window.location.href = "home.php";';
            echo '</script>';
            }else {     
                echo '<script>';
                echo 'alert("Échec de l\'emprunt. Veuillez réessayer.");';
                echo '</script>';
            }
        }catch (Exception $e) {
            echo '<script>';
            echo 'alert("Une erreur s\'est produite. Veuillez réessayer.");';
            echo '</script>';
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
