<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Directeur</title>
    <link rel="stylesheet" href="menu_admin.css">
    <script src="script.js"></script>
</head>
<body>

    <div class="menu">
<h1 class="banner">Zoo de Palmyre</h1>

<?php
echo "<h4 class='auth'>".$_SESSION["login"]."<br>";
echo  $_SESSION["fonction"]."</h4>";
?>


        <button onclick="openTab('dashboard')">Dashboard</button>
        <button onclick="openTab('ajouter')">Ajouter</button>
        <button onclick="openTab('modifier')">Modifier</button>
        <button onclick="openTab('rechercher')">Rechercher</button>
        <button onclick="openTab('supprimer')">Supprimer</button>
        <button onclick="openTab('contact')">Contact</button>

        <a href="logout.php"><button class="logout">Déconnexion</button></a>

   
    </div>

    <!-- Onglet Dashboard par défaut -->
    <div id="dashboard" class="tabcontent">
        <h2>Dashboard</h2>
    <h3>Nombre d'employés</h3>
    <div class="especes">
    <!-- Affiche le nombre d'employés présents dans la BDD -->
    <?php
                @include("connexion.php");
                $req1 = "SELECT COUNT(*) FROM personnel WHERE fonction = 'Employe'";
                $res1 = mysqli_query($conn, $req1);
                $row1 = mysqli_fetch_row($res1);
                echo $row1[0];
    ?>
    </div>

    <!-- Tableau Liste des employés -->
     <h3>Liste des employés</h3>
    <?php
     @include("connexion.php");
    $requete="SELECT * FROM personnel WHERE fonction ='Employe'";
    $resultat=mysqli_query($conn, $requete);
    ?>

    <div class="table_container">
    <table>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Identifiant</td>
            <td>Mot de passe</td>
            <td>Date de naissance</td>
            <td>Sexe</td>
            <td>Fonction</td>
            <td>Salaire</td>
            <td>Photo</td>
        </tr>

    <?php while($enreg=mysqli_fetch_array($resultat))
    {
    ?>
    <tr>
    <td><?php echo $enreg["id"];?></td>
    <td><?php echo $enreg["nom"];?></td>
    <td><?php echo $enreg["prenom"];?></td>
    <td><?php echo $enreg["login"];?></td>
    <td><?php echo "<input type='password' readonly value='".$enreg["password"]."'>";?></td>
    <td><?php echo $enreg["date_de_naissance"];?></td>
    <td><?php echo $enreg["sexe"];?></td>
    <td><?php echo $enreg["fonction"];?></td>
    <td><?php echo $enreg["salaire"];?></td>
    <td><?php echo "<img src='images/".$enreg['photo']."' width='100px'>";?></td>

    </tr>
    <?php  } ?>
    </table>
    </div>

</div>

    <!-- Onglet Ajouter -->
    <div id="ajouter" class="tabcontent">
        <h2>Ajouter</h2>
        <!-- Formulaire pour ajouter un employé -->
<form
        action="ajout_employe.php"
        method="POST" 
        enctype="multipart/form-data" 
        >
      <center>
        <div>
          <h3>Ajouter un employé</h3>
          <label>ID:</label>
          <input type="text" name="id" required/><br />

          <label>Nom:</label>
          <input type="text" name="nom" required/><br />

          <label>Prénom:</label>
          <input type="text" name="prenom" required/><br />

          <label>Identifiant:</label>
          <input type="text" name="login" required/><br />

          <label>Mot de passe:</label>
          <input type="password" name="password" required/><br />

          <label>Date de naissance:</label>
          <input type="date" name="date_de_naissance" required/><br />

          <label>Sexe:</label>
          <select name="sexe">
            <option>M</option>
            <option>F</option>
          </select><br>

          <label>Salaire:</label>
          <input type="number" step="0.01" name="salaire" required/><br /><br>

          <label for="photo">Photo:</label>
          <input type="file" id="file" name="file"/><br />
           

          <input type="submit" value="Ajouter" /><br />
          <input type="reset" value="Annuler" /><br />
</form>
        </div>
      </center>
        
    </div>

    <!-- Onglet Modifier -->
    <div id="modifier" class="tabcontent">
        <h2>Modifier</h2>
<center>
        <?php
    /* Code pour récupérer l'ID employé tapé par l'utilisateur dans le champ de texte */
 	@include("connexion.php");
	$id_modifier="";
	$enreg1=null;
	
	if (isset($_POST['id'])) {
	$id_modifier= $_POST['id'];
	$req3="SELECT * FROM personnel WHERE id='$id_modifier';";
	$res3=mysqli_query($conn, $req3);
    
    $enreg1=mysqli_fetch_array($res3);
	}
?>

<?php 
/* Si l'ID entrée dans le champ de recherche est valide alors... */
if ($enreg1 > 0)  {
		echo '<center>';
		echo "<h3>Voici les informations concernant l'employé: ".$enreg1['nom']."<br>"."(ID: ".$id_modifier.")</h3><br>";
		echo '</center>';
        
		mysqli_close($conn);
?>	
</center>
<center>
<!-- Formulaire modifiable où on affiche les informations sur l'employé -->
<form action="update_employe.php" method="POST" enctype="multipart/form-data">
	<label>ID:</label>
    <input type="text" name="id" value="<?php echo($enreg1['id']); ?>" readonly>
	<br>
	<label>Nom:</label>
    <input type="text" name="nom" value="<?php echo($enreg1['nom']); ?>" required>
	<br>
	<label>Prénom:</label>
    <input type="text" name="prenom" value="<?php echo($enreg1['prenom']); ?>" required>
	<br>
    <label>Identifiant:</label>
    <input type="text" name="login" value="<?php echo($enreg1['login']); ?>" required>
    <br>
    <label>Mot de passe:</label>
    <input type="password" name="password" value="<?php echo($enreg1['password']); ?>" required>
    <br>
    <label>Date de naissance:</label>
    <input type="text" name="date_de_naissance" value="<?php echo($enreg1['date_de_naissance']); ?>" required>
    <br>
	<label>Sexe (M ou F):</label>
    <input type="text" name="sexe" class="sexe" maxlength="1" value="<?php echo($enreg1['sexe']); ?>" required>
    <br>
    <label>Salaire (en €):</label>
    <input type="number" name="salaire" value="<?php echo($enreg1['salaire']); ?>" required>
	<br>
    <label for="photo">Photo:</label>
    <br>
    <?php echo "<img src='images/".$enreg1['photo']."' width='200px'>";?>
    <br>    
    <input type="file" id="file" name="file">
    <br>
	<input type="submit" name="modifier" value="Modifier les informations">
</form>
<form>
    <input type="submit" name="annuler_modif" value="Retour">
</form>
</center>
<?php
	}
    /* Affichage par défaut demandant à l'utilisateur de taper une ID employé dans le champ de recherche */
	else {
		echo '<form method="POST">';
		echo '<h3>Veuillez entrer un ID employé</h3>'.'<br>';
		echo '<input type="text" name="id">'.'<br>';
		echo '<input type="submit" name="envoyer_num" value="Envoyer" class="bouton">';
		echo '</form>';
        
    
        
    }
    if (isset($_POST['annuler_modif'])) {
        unset($_POST['id']);
    }
?>

    </div>

    <!-- Onglet Rechercher -->
    <div id="rechercher" class="tabcontent">
        <h2>Rechercher</h2>
    <center>
    <?php
    /* Code pour récupérer l'ID employé tapé par l'utilisateur dans le champ de recherche */
    @include("connexion.php");
	$contenu_rech="";
	$enreg2=null;

        if (isset($_POST['contenu_rech'])) {
	$contenu_rech= $_POST['contenu_rech'];
	$req4="SELECT * FROM personnel WHERE id='$contenu_rech';";
	$res4=mysqli_query($conn, $req4);
    
    $enreg2=mysqli_fetch_array($res4);
	}
    ?>
    <?php
    /* Si l'ID entrée dans le champ de recherche est valide alors,
    on affiche un tableau contenant les informations de l'employé avec l'ID correspondante */
     if ($enreg2 > 0)  {
		mysqli_close($conn);
?>
    <form method="POST">
	<input type="text" name="contenu_rech" value="<?php echo $enreg2['id'] ?>" placeholder="Saisir une ID" maxlength="3">
    <hr>
    <br>
<div class="table_container2">
    <table>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Identifiant</td>
            <td>Mot de passe</td>
            <td>Date de naissance</td>
            <td>Sexe</td>
            <td>Photo</td>
        </tr>


    <tr>
    <td><?php echo $enreg2["id"];?></td>
    <td><?php echo $enreg2["nom"];?></td>
    <td><?php echo $enreg2["prenom"];?></td>
    <td><?php echo $enreg2["login"];?></td>
    <td><?php echo "<input type='password' value='".($enreg2["password"])."' readonly>";?></td>
    <td><?php echo $enreg2["date_de_naissance"];?></td>
    <td><?php echo $enreg2["sexe"];?></td>
    <td><?php echo "<img src='images/".$enreg2['photo']."' width='100px'>";?></td>
    </tr>
    </table>
</div>
    <br>
    
    <input type="submit" name="recherche_animal" value="Rechercher" class="bouton">
    </form>

    <form method="POST">
    <input type="submit" name="annuler_rech" value="Retour" class="bouton">
    </form>
    
    <?php
	}
	else {
		echo '<form method="POST">';
		echo '<input type="text" name="contenu_rech" placeholder="Saisir une ID" maxlength="3">'.'<br>';
		echo '<input type="submit" name="recherche_animal" value="Rechercher" class="bouton">';
		echo '</form>';
        
    
        
    }
    if (isset($_POST['annuler_rech'])) {
        unset($_POST['contenu_rech']);
    }
    ?>
    
    

    </center>
    </div>

    <!-- Onglet Supprimer -->
<div id="supprimer" class="tabcontent">
        <h2>Supprimer</h2>
<?php
@include("connexion.php");
$req5 = "SELECT * FROM personnel WHERE fonction = 'Employe'";
    $res5 = mysqli_query($conn, $req5);
?>
<center>

<form action="supprimer_employe.php" method="POST">
<select name="employe_a_supprimer">
    <option value="">--Choississez un employé--</option>
    
<?php
$i = 1;
while($enreg3 = mysqli_fetch_array($res5))
{
    ?>
    <option><?php echo ($enreg3['nom'])?></option>
    
<?php
    $i++;
}?>

<input type="submit" value="Supprimer">
</form>
</select>
<br>
</div>

<div id="contact" class="tabcontent">
        <h2>Contact</h2>

    <h3>Zoo de Palmyre</h3>
    <div class="table_container" style=
 "border: 1px, solid, rgba(116, 109, 109, 0.74);
  border-radius: 12px;
  border-collapse: collapse;
  background-color: rgba(116, 109, 109, 0.279);
  padding: 5px;">
<p>
    Nous sommes situés entre les plages de la Côte de Beauté et la forêt de la Coubre, le Zoo de la Palmyre s'étend sur 18 hectares de pinède pour offrir une immersion totale à la rencontre de plus de 1 600 animaux, s'imposant ainsi comme l'un des sites touristiques les plus emblématiques de la Charente-Maritime et l'un des parcs zoologiques les plus fréquentés de France.
    <br>
    Traversé par des sentiers ombragés qui serpentent entre les enclos, Notre parc familial permet d'observer de très près une incroyable diversité d'espèces, des majestueuses girafes aux impressionnants grands ours, tout en sensibilisant vous, le public à la protection de la biodiversité et à la sauvegarde des espèces menacées à travers le monde.
</p>
</div>

<h3>Informations</h3>
<div class="table-container" style=
"border: 1px, solid, rgba(116, 109, 109, 0.74);
  border-radius: 12px;
  border-collapse: collapse;
  background-color: rgba(116, 109, 109, 0.279);
  padding: 5px;
  ">
<center>
<label>Adresse: 6 Av. de Royan, 17570 Les Mathes</label><br>
<label>Numéro de contact: 05 46 22 46 06</label><br>
<label>Localisation:</label>
<br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5574.256369896745!2d-1.1662578!3d45.6883995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48017bf63600b013%3A0x17992fdc6a81dad!2sZoo%20de%20La%20Palmyre!5e0!3m2!1sfr!2sfr!4v1775565026354!5m2!1sfr!2sfr" width="60%" height="" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</center>
</div>

</div>


<script>
    // Afficher onglet par défaut
    openTab('dashboard');
</script>

<?php 
/* Condition if afin de check si une valeur a été rentrée dans l'onglet Modifier
    ,si c'est le cas alors l'onglet Modifier sera ouvert par défaut au rafraîchissement de la page */
if (isset($_POST['id'])) {
    ?>
<script>
    openTab('modifier');
</script>
<?php 
unset($_POST['contenu_rech']);
}

/* Condition if afin de check si une valeur a été rentrée dans l'onglet Rechercher
    ,si c'est le cas alors l'onglet Rechercher sera ouvert par défaut au rafraîchissement de la page */

if (isset($_POST['contenu_rech'])) {
    ?>
<script>
    openTab('rechercher');
</script>
<?php
unset($_POST['id']);
}
?>

