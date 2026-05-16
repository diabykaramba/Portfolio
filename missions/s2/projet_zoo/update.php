<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
	<title>Mise à jour</title>
	<link rel="stylesheet" href="menu.css">
 </head>
 <body>
  <?php
 
	@include('connexion.php');
	
    	$id = $_POST['id'];
    	$id_espece = $_POST['id_espece'];
    	$date_de_naissance = $_POST['date_de_naissance'];
		$sexe = $_POST['sexe'];
    	$nom_animal = $_POST['nom_animal'];
		$commentaire = $_POST['commentaire'];

 
    	$requete = "UPDATE animaux SET id='$id', id_espece='$id_espece', date_de_naissance='$date_de_naissance', sexe='$sexe', nom_animal='$nom_animal', commentaire='$commentaire'";
		if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $nom_photo = $_FILES['file']['name'];
        $path = "images/" . $nom_photo;
        
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            $requete .= ", photo='$nom_photo'";
        }
    }

	$requete .= " WHERE id='$id'";
    $resultat = mysqli_query($conn, $requete);

    	if($resultat){
			echo '<center>';
        	echo "<h3>Modification effectuée avec succès</h3>";
            echo '<a href="menu_employe.php"><button class="bouton">Retour</button></a>';
			echo '</center>';
    	}
        else{
			echo '<center>';
        	echo "<h3>Echec de la modification</h3>";
            echo '<a href="menu_employe.php"><button class="bouton">Retour</button></a>';
			echo '</center>';
    	}
	
 
	mysqli_close($conn);
?>
 
 </body>
 </html>
