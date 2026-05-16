<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link rel="stylesheet" href="menu.css">
    </head>
<body>
    <?php
    @include("connexion.php");
    $a = $_POST['employe_a_supprimer'];
    $requete="DELETE FROM personnel WHERE nom='$a';";
    $resultat= mysqli_query($conn, $requete);
    if (!$resultat)
        {
            echo "<center><h3>Echec de la suprresion</h3><br>";
            echo '<a href="menu_admin.php"><button class="bouton">Retour</button></a></center>';
            echo mysqli_error($conn);
        }
        else if (mysqli_affected_rows($conn))
            echo "<center><h3>".$a." a été supprimé(e)</h3>";
            echo '<a href="menu_admin.php"><button class="bouton">Retour</button></a></center>';
            mysqli_close($conn);
    ?>
</body>
</html>