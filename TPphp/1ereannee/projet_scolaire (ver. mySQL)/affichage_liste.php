<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste déroulante</title>
    <style>
    /* Configuration de la page */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #ffafbd, #ffc3a0); /* Un dégradé rose plus doux */
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }

    /* Style du conteneur du Select */
    select {
        appearance: none; /* Supprime le style par défaut du navigateur */
        background-color: white;
        border: 2px solid #ff6b81;
        border-radius: 12px;
        padding: 12px 40px 12px 20px;
        font-size: 16px;
        color: #333;
        cursor: pointer;
        outline: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        
        /* Petite flèche personnalisée */
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23ff6b81' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 18px;
    }

    /* Effet au survol et focus */
    select:hover {
        border-color: #ff4757;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    select:focus {
        border-color: #ff4757;
        box-shadow: 0 0 0 3px rgba(255, 107, 129, 0.3);
    }

    /* Style des options (limité selon les navigateurs) */
    option {
        padding: 10px;
        background-color: white;
        color: #333;
    }
    button {
    display: inline-block;
    margin-top: 15px;
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
<body style="background-color: pink;">
<?php
@include("connexion.php");
$requete = "SELECT * FROM `eleves`";
    $resultat = mysqli_query($conn, $requete);
?>
<center>
    <?php
   
    echo "<h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>La session est ouverte au nom de: ".$_SESSION["login"]."<br>";
    echo "Vous êtes: ".$_SESSION["profil"]."</h4>";
    
    ?>
<select style="text-align: center; font-weight: bold;">
    <option value="">--Choississez un élève--</option>
    
<?php
$i = 1;
while($enre = mysqli_fetch_array($resultat))
{
    ?>
    <option><?php echo utf8_encode($enre['nom_eleve'])?></option>
    
<?php
    $i++;
}?>
</select>
<br>
<a href="menu.php"><button>Retour</button></a>
<center>
<?php mysqli_close($conn)?>
</body>
</html>
