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

// Requête SQL pour avoir la note minimale et la note maximale
$sql = "SELECT MAX(note) AS note_max, MIN(note) AS note_min FROM notes;";
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

<h2>Note maximale et minimale</h2>

<table>
    <tr>
        <th>Note minimale</th>
        <th>Note maximale</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['note_min']."</td>";
            echo "<td>".$row['note_max']."</td>";
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
