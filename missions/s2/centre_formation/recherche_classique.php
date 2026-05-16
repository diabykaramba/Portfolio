<?php
session_start();

$host = "localhost";
$user = "root";
$password = "mysql";
$database = "centre_formation";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
$result = null;
// Définir la fonction de recherche
if (isset($_POST['recherche'])) {
    $id = $_POST['id'];

    $sql_rech = "SELECT id_etudiant, nom, prenom, date_naissance, email, telephone FROM etudiants WHERE id_etudiant = '$id'";
    $result = mysqli_query($conn, $sql_rech);
}

// Définir la fonction annuler
if (isset($_POST['annuler'])) {
    unset($_POST['recherche']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recherche</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9; }
        table { border-collapse: collapse; width: 95%; margin: auto; background: white; }
        th, td { border: 1px solid #444; padding: 10px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
        .menu { padding: 15px; text-align: center; }
        .rech { padding: 20px; text-align: center;}
    </style>
</head>
<body>
    <?php
echo "<p style='float: left; position: absolute; top: -4px; font-weight: bold;'>Bienvenue ".$_SESSION["login"]."<br>";
echo "Rôle: ".$_SESSION["role"]."</p>";    
?>

<a href="logout.php" style='float: right; position: relative; top: -10px;';><button>Déconnexion</button></a>

<br>

<h2>Recherche par ID</h2>


<div class="rech">
    <form method="POST">
        <input type="number" value="1" name="id" min="1" required>
        <button type="submit" name="recherche">Rechercher</button>
        <button type="submit" name="annuler">Annuler</button>
    </form>
</div>

<table>

<?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id_etudiant']."</td>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['prenom']."</td>";
            echo "<td>".$row['date_naissance']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['telephone']."</td>";
            echo "</tr>";
        }
    } else if (isset($_POST['recherche'])) {
        // Si le formulaire a été envoyé mais rien n'a été trouvé
        echo "<tr><td colspan='7'>Aucun étudiant trouvé avec cet ID.</td></tr>";
    } else {
        echo "<tr><td colspan='7'>Veuillez entrer un ID</td></tr>";
    }
    mysqli_close($conn);
    ?>
</table>


</body>
</html>