<html>
<body>
    <?php
    @include("connexion.php");
    $c = $_POST['num'];
    $requete="DELETE FROM eleves WHERE num_eleve='$c';";
    echo "<center>".$requete."</center>";
    $resultat= mysqli_query($conn, $requete);
    if (!$resultat)
        {
            echo "<center><h1>Echec de la suprresion</h1></center>";
            echo mysqli_error($conn);
        }
        else if (mysqli_affected_rows($conn))
            echo "<center><h1>Suppression effectuée</h1></center>";
            echo '<center><a href="menu.php">Retour</a></center>';
            mysqli_close($conn);
    ?>
</body>
</html>