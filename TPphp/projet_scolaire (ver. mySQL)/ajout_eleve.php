<?php
@include("connexion.php");
$a = $_POST["num_eleve"];
$b =  $_POST["nom_eleve"];
$c= $_POST["adresse"];
$d= $_POST["num_telephone"];

$file = $_FILES['file'];
$file_name = $_FILES['file']['name'];
$_file_tmp_name = $_FILES['file']['tmp_name'];


$reql = "INSERT INTO eleves (num_eleve, nom_eleve, adresse, num_telephone, photo) VALUES ('$a','$b', '$c', '$d', '$file_name')";

$path = "images/$file_name";
if(move_uploaded_file($_file_tmp_name, $path)) {
    if (mysqli_query($conn, $reql)) {
echo "Etudiant ajouté avec succès.";
echo '<center><a href="menu.php">Retour</a></center>';

    }
    else {
        echo "Erreur d'ajout";
        echo '<center><a href="menu.php">Retour</a></center>';
    }
}
    else {
        echo "Erreur de chargement de l'image.";
        echo '<center><a href="menu.php">Retour</a></center>';
    }


mysqli_close($conn)

?>
