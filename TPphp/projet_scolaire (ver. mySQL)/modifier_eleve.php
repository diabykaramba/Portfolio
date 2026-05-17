<html>
    <head>
        <link rel="stylesheet" href="affichage.css">
    </head>
<?php
 	@include("connexion.php");
	 $code=$_GET['num_eleve'];
	 $rql= "SELECT * from eleves where num_eleve='$code'";
	$resultat=mysqli_query($conn, $rql);
    $enreg=mysqli_fetch_array($resultat);
 
?>
 
	<?php
	echo '<form action="update.php" method="post">';
	echo '<input type="text" name ="num_eleve" value="'.$enreg['num_eleve'].'">';
	echo '<input type="text" name="nom_eleve" value="'.$enreg['nom_eleve'].'">';
	echo '<input type="text" name="adresse" value="'.$enreg['adresse'].'">';
	echo '<input type="text" name="num_telephone" value="'.$enreg['num_telephone'].'">';
	echo '<input type="submit" value="Modifier">';
	echo '<br><a href="affichage_eleves.php">retour</a>';
	mysqli_close($conn);
	echo '</form>'
	?>
 
</html>
