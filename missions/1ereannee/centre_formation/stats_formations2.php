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

// Requête SQL pour avoir le nombre total de modules par formation
$sql = "SELECT f.intitule, COUNT(m.id_module) AS nb_modules FROM modules m JOIN formations f ON m.id_formation=f.id_formation GROUP BY f.intitule;";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stats formations</title>

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

<h2>Nombre de modules par formation</h2>

<table>
    <tr>
        <th>Nombre</th>
        <th>Intitulé</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['nb_modules']."</td>";
            echo "<td>".$row['intitule']."</td>";
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
