<?php
session_start();
?>
<html>
    <head>
        <title>Tableau</title>
        <link rel="stylesheet" href="affichage.css">
</head>
<body>
    <?php
     @include("connexion.php");
    $requete="select * from eleves";
    $resultat=mysqli_query($conn, $requete);
    ?>

    <?php
   
    echo "<h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>La session est ouverte au nom de: ".$_SESSION["login"]."<br>";
    echo "Vous êtes: ".$_SESSION["profil"]."</h4>";
    
    ?>
    

    <center>
        <table>
        <tr>
            <td>Numéro</td>
            <td>Nom</td>
            <td>Adresse</td>
            <td>Numéro de téléphone</td>
            <td>Photo</td>
            <td>Action 1</td>
            <td>Action 2</td>
            <td>Action 3</td>
        </tr>

    <?php while($enreg=mysqli_fetch_array($resultat))
    {
    ?>
    <tr>
    <td><?php echo $enreg["num_eleve"];?></td>
    <td><?php echo $enreg["nom_eleve"];?></td>
    <td><?php echo $enreg["adresse"];?></td>
    <td><?php echo $enreg["num_telephone"];?></td>
    <td><?php echo "<img src='images/".$enreg['photo']."' width='100px'>";?></td>
    <td><?php echo "<a href='supprimer_eleve2.php?num_eleve=".$enreg['num_eleve']."'>Supprimer</a>";?></td>
    <td><?php echo "<a href='modifier_eleve.php?num_eleve=".$enreg['num_eleve']."'>Modifier</a>";?></td>
    <td><?php echo "<a href='afficher_eleve.php?num_eleve=".$enreg['num_eleve']."'>Afficher</a>";?></td>
    </tr>
    <?php  } ?>
    </table></center>
    <?php
    echo '<center><a href="menu.php">Retour</a></center>';
    mysqli_close($conn);
    ?>
    </body>
    </html>
