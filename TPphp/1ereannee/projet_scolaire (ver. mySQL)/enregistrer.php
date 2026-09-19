<?php
@include("connexion.php");
$a = $_POST["login"];
$b =  $_POST["profil"];
$c= $_POST["mdp"];


$reql = "INSERT INTO users VALUES ('$a','$b', '$c')";
$rl = mysqli_query($conn, $reql);

echo "<center><p>Enregistrement OK </p></center>";
echo '<center><a href="index.php">Retour</a></center>';

mysqli_close($conn)

?>
