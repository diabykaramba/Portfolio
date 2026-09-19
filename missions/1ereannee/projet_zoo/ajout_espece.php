<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mise à jour</title>
<link rel="stylesheet" href="menu.css">
</head>
<body>
<?php
@include("connexion.php");
$a = $_POST["id"];
$b =  $_POST["nom_espece"];
$c= $_POST["id_nourriture"];
$d= $_POST["duree_vie_moyenne"];
$e= $_POST["aquatique"];



$reql = "INSERT INTO especes (id, nom_espece, id_nourriture, duree_vie_moyenne, aquatique) VALUES ('$a','$b', '$c', '$d', '$e')";
 
if (mysqli_query($conn, $reql)) {
echo "<center><h3>Espèce ajoutée avec succès.</h3>";
echo '<a href="menu_employe.php"><button class="bouton">Retour</button></a></center>';
    }
    else {
        echo "<center><h3>Erreur d'ajout</h3>";
        echo '<a href="menu_employe.php"><button class="bouton">Retour</button></a></center>';
    }



mysqli_close($conn)

?>
</body>
</html>
