<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
	<title>Mise à jour</title>
 </head>
 <body>
  <?php
 
	@include('connexion.php');
	
    	$num = $_POST['num_eleve'];
    	$nom = $_POST['nom_eleve'];
    	$adresse = $_POST['adresse'];
    	$num_telephone = $_POST['num_telephone'];
 
    	$requete = "UPDATE eleves SET num_eleve='$num', nom_eleve='$nom', adresse='$adresse', num_telephone='$num_telephone' WHERE num_eleve='$num'";
    	$resultat = mysqli_query($conn, $requete);
 
    	if($resultat){
        	echo "Modification effectuée avec succès";
            echo '<br><a href="menu.php">Retour</a>';
    	}
        else{
        	echo "Echec de la modification";
            echo '<br><a href="menu.php">Retour</a>';
    	}
	
 
	mysqli_close($conn);
?>
 
 </body>
 </html>
