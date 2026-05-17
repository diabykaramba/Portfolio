<html>
<?php
@include("connexion.php");
$code=$_GET['num_enseignant'];
$rql= "DELETE FROM enseignants WHERE num_enseignant='$code'";
mysqli_query($conn, $rql);

header('location:affichage_enseignants.php');
exit;

mysqli_close($conn);
?>
</html>