<?php
session_start();
include_once('../database/config.php');
include_once('../controllers/StockController.php');
$stockController = new StockController();
$materiels = $stockController->stockList();
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
                        <form method="post" action="Modifier_Materiel.php">
                            <input type="hidden" name="idP" value="<?php echo $materiel['idP']; ?>">
                            <button type="submit" class="btn btn-warning">Modifier</button>
                        </form>

                        <form method="post" action="Supprimer_Materiel.php">
                            <input type="hidden" name="idP" value="<?php echo $materiel['idP']; ?>">
                            <input type="submit" class="btn btn-danger" name="Supprimer" value="Supprimer"> 
                            
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="Ajout_Materiel.php" class="btn btn-success">Ajouter Matériel</a>
    <a href="home.php" class="btn btn-secondary">Retour</a>

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
