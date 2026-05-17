<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
 	<title>Modifier</title>
	<style>
		/* Style global */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f6;
    color: #333;
    line-height: 1.6;
    margin: 0;
    padding: 20px;
}

/* Conteneur principal (simulé par les balises center du PHP) */
center {
    max-width: 500px;
    margin: 40px auto;
    background: #fff;
    padding: 30px;
    border-radius: 8px;
   
}

/* Titres et messages */
center > b, 
center {
    font-size: 1.1rem;
    margin-bottom: 20px;
}

/* Formulaire */
form {
    display: flex;
    flex-direction: column;
    text-align: left;
	
}

/* Labels */
label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

/* Champs de saisie */
input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box; /* Important pour que le padding n'élargisse pas l'input */
    font-size: 1rem;
}

/* Champ en lecture seule */
input[readonly] {
    background-color: #eee;
    color: #777;
    cursor: not-allowed;
}

/* Bouton de validation (Modifier / Envoyer) */
input[type="submit"] {
    background-color: #2ecc71;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: bold;
    transition: background 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #27ae60;
}

/* Bouton Retour */
button {
    margin-top: 15px;
	background-color: white;
    color: #95a5a6;
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    text-decoration: underline;
	color: #34495e;
}
</style>
</head>
<body>
<?php
 	@include("connexion.php");
	$d="";
	$enreg=null;
	
	if (isset($_POST['num_eleve'])) {
	$d= $_POST['num_eleve'];
	$requete="SELECT * FROM eleves WHERE num_eleve='$d';";
	$resultat=mysqli_query($conn, $requete);
    	
	
	$enreg=mysqli_fetch_array($resultat);
	}
?>
<?php if ($enreg > 0)  {
		echo '<center>';
		echo "<h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>La session est ouverte au nom de: ".$_SESSION["login"]."<br>";
    	echo "Vous êtes: ".$_SESSION["profil"]."</h4>";

		echo "Voici les informations concernant l'élève ".$d."<br>";
		echo '</center>';
		mysqli_close($conn);
?>	
<center>
	
<form action="update.php" method="POST">
	<label>Numéro:</label>
    <input type="text" name="num_eleve" value="<?php echo($enreg['num_eleve']); ?>" readonly>
	<br>
	<label>Nom:</label>
    <input type="text" name="nom_eleve" value="<?php echo($enreg['nom_eleve']); ?>">
	<br>
	<label>Adresse:</label>
    <input type="text" name="adresse" value="<?php echo($enreg['adresse']); ?>">
	<br>
	<label>Numéro de téléphone:</label>
    <input type="text" name="num_telephone" value="<?php echo($enreg['num_telephone']); ?>">
	<br>
	<input type="submit" name="modifier" value="Modifier les informations">
</form>
	<a href="menu.php"><button>Retour</button></a>
</center>
<?php
	}
	else {
		echo "<h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>La session est ouverte au nom de: ".$_SESSION["login"]."<br>";
    	echo "Vous êtes: ".$_SESSION["profil"]."</h4>";

		echo '<center>';
		echo '<form method="POST">';
		echo 'Veuillez entrer un numéro élève'.'<br>';
		echo '<input type="text" name="num_eleve">'.'<br>';
		echo '<input type="submit" name="envoyer_num" value="Envoyer">';
		echo '</form>';
		echo '<a href="menu.php"><button>Retour</button></a>';
		echo '</center>';
   
    
	}
 
?>
 
	<?php
	/*
	echo '<form action="update.php" method="POST">';
	echo '<input type="text" name ="num" value="'.$enreg['num_eleve'].'">';
	echo '<input type="text" name="nom" value="'.$enreg['nom_eleve'].'">';
	echo '<input type="text" name="adresse" value="'.$enreg['adresse'].'">';
	echo '<input type="text" name="num_telephone" value="'.$enreg['num_telephone'].'">';
 
	echo '<input type="submit" value="modifier">';
	
	echo '</form>'
	Plus besoin...
	*/
	?>
 
</body>
</html>
