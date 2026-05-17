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
$sql = "SELECT * FROM auteurs";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Auteurs</title>

    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #444; padding: 10px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
    </style>

</head>
<body>

<h2>Liste des Auteurs</h2>

<table>
    <tr>
        <th>ID Auteur</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['ID_Auteur']."</td>";
            echo "<td>".$row['Nom']."</td>";
            echo "<td>".$row['Prenom']."</td>";
            echo "<td>".$row['Date_naissance']."</td>";
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
