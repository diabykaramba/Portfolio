<html>
    <head>
        <link rel="stylesheet" href="affichage.css">
    </head>
<?php
 	@include("connexion.php");
	 $code=$_GET['num_eleve'];
	 $rql= "SELECT * from enseignants where num_enseignant='$code'";
	$resultat=mysqli_query($conn, $rql);
    $enreg=mysqli_fetch_array($resultat);
 
?>
 
	<?php
	echo '<form action="update.php" method="post">';
	echo '<input type="text" name ="num_enseignant" value="'.$enreg['num_enseignant'].'">';
	echo '<input type="text" name="nom_enseignant" value="'.$enreg['nom_enseignant'].'">';
	echo '<input type="text" name="adresse" value="'.$enreg['adresse'].'">';
	echo '<input type="text" name="num_telephone" value="'.$enreg['num_telephone'].'">';
	echo '<input type="submit" value="Modifier">';
	echo '<br><a href="affichage_enseignants.php">retour</a>';
	mysqli_close($conn);
	echo '</form>'
	?>
 
</html>
