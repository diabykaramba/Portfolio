<?php
@include("connexion.php");
$a = $_POST["login"];
$b =  $_POST["password"];
$c= $_POST["fonction"];
$d= $_POST["sexe"];
$e= $_POST["nom"];
$f= $_POST["prenom"];
$g= $_POST["date_de_naissance"];


$reql = "INSERT INTO personnel (login, password, fonction, sexe, nom, prenom, date_de_naissance) VALUES ('$a','$b', '$c', '$d', '$e', '$f', '$g')";
$rl = mysqli_query($conn, $reql);

echo "<center><p>Enregistrement effectué.</p></center>";
echo '<center><a href="index.php">Retour</a></center>';

mysqli_close($conn)

?>