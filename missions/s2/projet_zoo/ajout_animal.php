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
$b =  $_POST["id_espece"];
$c= $_POST["date_de_naissance"];
$d= $_POST["sexe"];
$e= $_POST["nom_animal"];
$f= $_POST["commentaire"];

$file = $_FILES['file'];
$file_name = $_FILES['file']['name'];
$_file_tmp_name = $_FILES['file']['tmp_name'];


$reql = "INSERT INTO animaux (id, id_espece, date_de_naissance, sexe, nom_animal, commentaire, photo) VALUES ('$a','$b', '$c', '$d', '$e', '$f', '$file_name')";

$path = "images/$file_name";



if(move_uploaded_file($_file_tmp_name, $path)) {
    if (mysqli_query($conn, $reql)) {
echo "<center><h3>Animal ajouté avec succès.</h3>";
echo '<a href="menu_employe.php"><button class="bouton">Retour</button></a></center>';

    }
    else {
        echo "<center><h3>Erreur d'ajout</h3>";
        echo '<a href="menu_employe.php"><button class="bouton">Retour</button></a></center>';
    }
}
else {
        echo "Erreur de chargement de l'image.";
        echo '<center><a href="menu_employe.php">Retour</a></center>';
    }


mysqli_close($conn)

?>
</body>
</html>
