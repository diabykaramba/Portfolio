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

// Fonction d'ajout
if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_n = $_POST['date_naissance'];
    $email = $_POST['email'];
    $tel = $_POST['telephone'];

    $sql_ins = "INSERT INTO etudiants (nom, prenom, date_naissance, email, telephone) 
                VALUES ('$nom', '$prenom', '$date_n', '$email', '$tel')";
    
    echo "<h2>Ajouté avec succès!</h2>";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Stats étudiants</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9; }
        table { border-collapse: collapse; width: 95%; margin: auto; background: white; }
        th, td { border: 1px solid #444; padding: 10px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
        .menu { padding: 15px; text-align: center; }
    </style>
</head>
<body>
<?php
echo "<p style='float: left; position: absolute; top: 5px; font-weight: bold;'>Bienvenue ".$_SESSION["login"]."<br>";
echo "Rôle: ".$_SESSION["role"]."</p>";    
?>

<a href="logout.php" style='float: right; position: relative; top: -5px;';><button>Déconnexion</button></a>

<br>

<h2>Ajouter un nouvel étudiant</h2>

<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Action</th>
    </tr>

    <tr class="ajout-ligne">
        <form method="POST">
            <td><input type="text" name="nom" placeholder="Nom" required></td>
            <td><input type="text" name="prenom" placeholder="Prénom" required></td>
            <td><input type="date" name="date_naissance" required></td>
            <td><input type="email" name="email" placeholder="exemple@mail.com" required></td>
            <td><input type="tel" name="telephone" placeholder="06..." required></td>
            <td><button type="submit" name="ajouter">Enregistrer</button></td>
        </form>
    </tr>

</table>

</body>
</html>