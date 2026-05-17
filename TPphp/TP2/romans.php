<?php

$host = "localhost";
$user = "root";
$password = "mysql";
$database = "bibliotheque";

$conn = mysqli_connect($host, $user, $password, $database);

// Vérification
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Requête SQL
$sql = "SELECT * FROM livres WHERE Genre = 'Roman'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jules ou Émile</title>

    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #444; padding: 10px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
    </style>

</head>
<body>

<h2>Liste des livres du genre 'Roman'</h2>

<table>
    <tr>
        <th>Ref. livre</th>
        <th>Nombre de pages</th>
        <th>Année</th>
        <th>Genre</th>
        <th>Disponibilité</th>
        <th>Nombre d'emprunts</th>
        <th>Etat</th>
        <th>Nombre d'exemplaire</th>
        <th>ID Auteur</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['Reference_livre']."</td>";
            echo "<td>".$row['Nbre_pages']."</td>";
            echo "<td>".$row['Année']."</td>";
            echo "<td>".$row['Genre']."</td>";
            echo "<td>".$row['Disponibilité']."</td>";
            echo "<td>".$row['Nbre_emprunts']."</td>";
            echo "<td>".$row['Etat']."</td>";
            echo "<td>".$row['Nbre_exemplaire']."</td>";
            echo "<td>".$row['ID_Auteur']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Aucun client trouvé.</td></tr>";
    }

    mysqli_close($conn);
    ?>

</table>
<br>
<center>
<button><a href="index.php">Retour</a></button>
<center>
</body>
</html>
