<html>
<?php
@include("connexion.php");
$code=$_GET['num_eleve'];
$rql= "DELETE FROM eleves WHERE num_eleve='$code'";
mysqli_query($conn, $rql);

header('location:affichage_eleves.php');
exit;

mysqli_close($conn);
?>
</html>