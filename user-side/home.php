<?php
include_once('../database/config.php');
include_once('../controllers/EmpruntController.php');
include_once('../controllers/EmprunteurController.php');
include_once('../controllers/StockController.php');
$empruntController = new EmpruntController();
$emprunts = $empruntController->empruntList();

$emprunteurController = new EmprunteurController();
$stockController = new StockController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
      body {

justify-content: center;
height: 200vh;
margin: 0;
background: #BF00FF;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #AA076B, #61045F);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #AA076B, #61045F);
}
h1{
text-align: center;
font-size: 2.5rem;
color: black;
font-family: Monospace;
}
#liste{
justify-content: center;
align-items: center;
width: 80%;
margin: auto;
display: flex;
margin-bottom: 50px;
}
.card {
background-color: #212121;
position: relative;
display: flex;
align-items: center;
justify-content: center;
width: 25%;
margin-left: 1.6%;
box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
padding: 32px;
overflow: hidden;
border-radius: 10px;
transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
}

.content {
color: #e8e8e8;
}

.content .heading {
font-weight: 300;
font-size: 30px;
color:#111;
}
span{
font-size: 1.1rem;
color: #f1f1f1;
}
.para p{
font-size: 1.2rem;
color: #00b7ff;
}

#mySidenav {
height: 100%;
width: 0;
position: fixed;
z-index: 1;
top: 0;
left: 0;
background-color: #111;
overflow-x: hidden;
transition: 0.5s;
padding-top: 60px;
}

#mySidenav a {
padding: 15px 25px;
text-decoration: none;
font-size: 20px;
color: #818181;
display: block;
transition: 0.3s;
}

#mySidenav a:hover {
color: #f1f1f1;
}

#main {

transition: margin-left 0.5s;
padding: 16px;
}
#main a{
text-decoration: none;
}
.cssbuttons-io-button {
display: flex;
align-items: center;
font-family: inherit;
font-weight: 500;
font-size: 16px;
padding: 0.7em 1.4em 0.7em 1.1em;
color: white;
background: #ad5389;
background: linear-gradient(0deg, #086e97 0%, #00b7ff 100%);
border: none;
box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
letter-spacing: 0.05em;
border-radius: 20em;
}

.cssbuttons-io-button svg {
margin-right: 6px;
}

.cssbuttons-io-button:hover {
box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
}

.cssbuttons-io-button:active {
box-shadow: 0 0.3em 1em -0.5em #14a73e98;
}

.Btn {
display: flex;
align-items: center;
justify-content: flex-start;
width: 45px;
height: 45px;
border: none;
border-radius: 50%;
cursor: pointer;
position: relative;
overflow: hidden;
transition-duration: .3s;
box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
background-color: #ad5389;
}

/* plus sign */
.sign {
width: 100%;
transition-duration: .3s;
display: flex;
align-items: center;
justify-content: center;
}

.sign svg {
width: 17px;
}

.sign svg path {
fill: white;
}
/* text */
.text {
position: absolute;
right: 0%;
width: 0%;
opacity: 0;
color: white;
font-size: 1.2em;
font-weight: 600;
transition-duration: .3s;
}
/* hover effect on button width */
.Btn:hover {
width: 125px;
border-radius: 40px;
transition-duration: .3s;
}

.Btn:hover .sign {
width: 15%;
transition-duration: .3s;
padding-left: 20px;
}
/* hover effect button's text */
.Btn:hover .text {
opacity: 1;
width: 70%;
transition-duration: .3s;
padding-right: 10px;
}
/* button click effect*/
.Btn:active {
transform: translate(2px ,2px);
}
    </style>
</head>
<body>
<div id="mySidenav">
        <a href="#" onclick="closeNav()">Fermer</a>
        <a href="Liste_Emprunteur.php">Emprunter</a>
        <a href="ListeMembres.php">Liste de membres</a>
        <a href="ListeMateriel.php">Liste de matériels</a>
        <a href="login.html">
            <button class="Btn">
                <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>    
                <div class="text">Logout</div>
              </button>
        </a>     
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">☰</span>
        <h1>Liste des Emprunts</h1>
    </div>
    <div id="liste">
    <?php
        foreach ($emprunts as $index => $emprunt) {
        $emprunteur = $emprunteurController->getEmprunteur($emprunt['idEmr']);
        $materiel = $stockController->getStock($emprunt['idP']);

        if ($emprunteur && $materiel) {
            echo '<div class="card">';
            echo '<div class="content">';
            echo '<p class="heading">' . ($index + 1) . '</p>';
            echo '<div class="para">';
            echo '<p>Prenom : <span>' . $emprunteur['first_name'] . '</span></p>';
            echo '<p>Nom : <span>' . $emprunteur['last_name'] . '</span></p>';
            echo '<p>N°Tel : <span>' . $emprunteur['tel'] . '</span></p>';
            echo '<p>Date d\'emprunt : <span>' . $emprunt['dateE'] . '</span></p>';
            echo '<p>Heure d\'emprunt : <span>' . $emprunt['heureE'] . '</span></p>';
            echo '<p>Date de retour : <span>' . $emprunt['dateR'] . '</span></p>';
            echo '<p>Heure de retour : <span>' . $emprunt['heureR'] . '</span></p>';
            echo '<p>Nom de pièce : <span>' . $materiel['piece_name'] . '</span></p>';
            echo '<p>Nombre de pièce : <span>' . $emprunt['qte'] . '</span></p>';
            echo '<form action="Supprimer_Emprunt.php" method="post">';
            echo '<input type="hidden" name="idE" value="' . $emprunt['idE'] . '">';
            echo '<input type="hidden" name="idP" value="' . $emprunt['idP'] . '">';
            echo '<input type="hidden" name="piece_name" value="' . $materiel['piece_name'] . '">';
            echo '<input type="hidden" name="qte" value="' . $emprunt['qte'] . '">';
            echo '<input type="submit" class="btn btn-danger" value="Supprimer" name="Supprimer">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            if (($index + 1) % 3 == 0 && $index + 1 != $emprunts->rowCount()) {
                echo '</div><div id="liste">';
            }
        }
        }
?>

</div>
    <script>
         function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>
</html>
