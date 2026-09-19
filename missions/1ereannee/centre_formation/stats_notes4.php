<?php
session_start();

$host = "localhost";
$user = "root";
$password = "mysql";
$database = "centre_formation";

$conn = mysqli_connect($host, $user, $password, $database);

// Vérification
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Requête SQL pour connaître la liste des étudiants ayant eu une note supérieure à 12/20
$sql = "SELECT e.id_etudiant AS id_primaire, nom, prenom, note FROM etudiants e INNER JOIN notes n ON e.id_etudiant = n.id_etudiant WHERE note > 12 ORDER BY note DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stats notes</title>

    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #444; padding: 10px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
        .menu { padding: 15px; text-align: center;}
    </style>

</head>
<body>
<?php
echo "<p style='float: left; position: absolute; top: -5px; font-weight: bold;'>Bienvenue ".$_SESSION["login"]."<br>";
echo "Rôle: ".$_SESSION["role"]."</p>";    
?>

<a href="logout.php" style='float: right; position: relative; top: -11px;';><button>Déconnexion</button></a>

<br>

<h2>Étudiants ayant eu une note supérieure à 12/20</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Note</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id_primaire']."</td>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['prenom']."</td>";
            echo "<td>".$row['note']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Aucun client trouvé.</td></tr>";
    }

    mysqli_close($conn);
    ?>

</table>

</body>
</html>
