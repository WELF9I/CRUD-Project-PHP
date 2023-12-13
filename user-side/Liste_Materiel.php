<?php
session_start();
include_once('../database/config.php');
include_once('../controllers/StockController.php');
$stockController = new StockController();
$materiels = $stockController->stockList();
$idEmr= $_POST['idEmr'];
$first_name= $_POST['first_name'];
$last_name = $_POST['last_name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$cin = $_POST['cin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste du Matériel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        input[type="button"], input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body class="container">
    <h1 class="mt-5">Liste du Matériel</h1>
    <input type="text" id="searchInput" onkeyup="filterTable()" class="form-control" placeholder="Rechercher par nom">

    <table id="materielTable" class="table mt-3">
        <thead>
            <tr>
                <th>Nom de Pièce</th>
                <th>Quantité</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materiels as $materiel) : ?>
                <tr>
                    <td><?php echo $materiel['piece_name']; ?></td>
                    <td><?php echo $materiel['qte']; ?></td>
                    <td>
                        <form method="post" action="Ajout_Emprunt.php">
                            <?php
                                $_SESSION['emprunt_data']['materiel'] = array(
                                    'idP' => $materiel['idP'],
                                    'piece_name' => $materiel['piece_name']
                                );
                            ?>
                            <input type="hidden" name="idP" value="<?php echo $materiel['idP']; ?>">
                            <input type="hidden" name="piece_name" value="<?php echo $materiel['piece_name']; ?>">
                            <input type="hidden" name="idEmr" value="<?php echo $idEmr; ?>">
                            <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                            <input type="hidden" name="last_name" value="<?php echo $last_name ; ?>">
                            <input type="hidden" name="tel" value="<?php echo $tel; ?>">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <input type="hidden" name="cin" value="<?php echo $cin ; ?>">
                            <button type="submit" class="btn btn-success" name="Emprunter">Emprunter</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="Liste_Emprunteur.php" class="btn btn-secondary">Retour</a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("materielTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
