<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mise à jour</title>
<link rel="stylesheet" href="menu_admin.css">
</head>
<body>
<?php
@include("connexion.php");
$a = $_POST["id"];
$b =  $_POST["nom"];
$c= $_POST["prenom"];
$d= $_POST["login"];
$e= $_POST["password"];
$f= $_POST["date_de_naissance"];
$g= $_POST["sexe"];
$h= $_POST["salaire"];


$file = $_FILES['file'];
$file_name = $_FILES['file']['name'];
$_file_tmp_name = $_FILES['file']['tmp_name'];



$reql = "INSERT INTO personnel (id, nom, prenom, login, password, date_de_naissance, sexe, fonction, salaire, photo) VALUES ('$a','$b', '$c', '$d', '$e', '$f', '$g', 'Employe', '$h', '$file_name')";


$path = "images/$file_name";

if(move_uploaded_file($_file_tmp_name, $path)) {
    if (mysqli_query($conn, $reql)) {
echo "<center><h3>Employé ajouté avec succès.</h3>";
echo '<a href="menu_admin.php"><button class="bouton">Retour</button></a></center>';

    }
    else {
        echo "<center><h3>Erreur d'ajout</h3>";
        echo '<a href="menu_admin.php"><button class="bouton">Retour</button></a></center>';
    }
}
else {
        echo "Erreur de chargement de l'image.";
        echo '<center><a href="menu_admin.php">Retour</a></center>';
    }


mysqli_close($conn)

?>
</body>
</html>
