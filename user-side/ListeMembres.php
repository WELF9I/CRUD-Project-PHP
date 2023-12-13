<?php
session_start();
include_once('../database/config.php');
include_once('../controllers/EmprunteurController.php');

$emprunteurController = new EmprunteurController();
$emprunteurs = $emprunteurController->emprunteurList();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Emprunteurs</title>
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
    <h1 class="mt-5">Liste des Emprunteurs</h1>
    <input type="text" id="searchInput" onkeyup="filterTable()" class="form-control" placeholder="Rechercher par nom">

    <table id="emprunteurTable" class="table mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Details</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emprunteurs as $emprunteur) : ?>
                <tr>
                    <td><?php echo $emprunteur['first_name'] . " " . $emprunteur['last_name']; ?></td>
                    <td>
                        <details>
                            <summary>More details</summary>
                            <?php echo "Tel : ".$emprunteur['tel']; ?>
                            <?php echo "<br/>E-mail : ".$emprunteur['email']; ?>
                            <?php echo "<br/>Cin : ".$emprunteur['cin']; ?>
                        </details>
                    </td>
                    <td>
                        <!-- Formulaire de modification -->
                        <form action="Modifier_Emprunteur.php" method="post">
                            <input type="hidden" name="idEmr" value="<?php echo $emprunteur['idEmr']; ?>">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                        <!-- Formulaire de suppression -->
                        <form method="post" action="Supprimer_Emprunteur.php">
                            <input type="hidden" name="idEmr" value="<?php echo $emprunteur['idEmr']; ?>">
                            <button type="submit" class="btn btn-danger" name="Supprimer">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="Ajout_Emprunteur.php" class="btn btn-success">Ajouter Emprunteur</a>
    <a href="home.php" class="btn btn-secondary">Retour</a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("emprunteurTable");
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

