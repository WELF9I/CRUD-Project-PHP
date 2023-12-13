<?php
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
    <input type="text" id="searchInput" onkeyup="filterTable()" class="form-control mt-3" placeholder="Rechercher par nom">
    <table id="emprunteurTable" class="table mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Détails</th>
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
                        <form action="Liste_Materiel.php" method="post">
                            <input type="hidden" name="idEmr" value="<?php echo $emprunteur['idEmr']; ?>">
                            <input type="hidden" name="first_name" value="<?php echo $emprunteur['first_name']; ?>">
                            <input type="hidden" name="last_name" value="<?php echo $emprunteur['last_name']; ?>">
                            <input type="hidden" name="tel" value="<?php echo $emprunteur['tel']; ?>">
                            <input type="hidden" name="email" value="<?php echo $emprunteur['email']; ?>">
                            <input type="hidden" name="cin" value="<?php echo $emprunteur['cin']; ?>">
                            <button type="submit" class="btn btn-success" name="EmprunterP">Choisir pièce</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
