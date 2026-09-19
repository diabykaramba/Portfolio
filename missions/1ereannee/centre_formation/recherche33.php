<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9; }
        table { border-collapse: collapse; width: 95%; margin: auto; background: white; }
        th, td { border: 1px solid #444; padding: 10px; text-align: center; }
        th { background-color: #e4e4e4; }
        h2 { text-align: center; }
    </style>
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$password = "mysql";
$database = "centre_formation";

$conn = mysqli_connect($host, $user, $password, $database);
$d= $_POST["s1"];
$requete="select * from etudiants where nom='$d';";
$resultat=mysqli_query($conn, $requete);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>
<?php
echo "<p style='float: left; position: absolute; top: -5px; font-weight: bold;'>Bienvenue ".$_SESSION["login"]."<br>";
echo "Rôle: ".$_SESSION["role"]."</p>";    
?>

<a href="logout.php" style='float: right; position: relative; top: -11px;';><button>Déconnexion</button></a>

<br>
<br>
<center><table border="1">
<tr>
    <td>ID</td>
    <td>Nom</td>
    <td>Prénom</td>
    <td>Date de naissance</td>
    <td>Email</td>
    <td>Téléphone</td>
    
</tr>
<?php while($enreg=mysqli_fetch_array($resultat))
{
?>
<tr>
<td><?php echo $enreg["id_etudiant"] ;?></td>
<td><?php echo $enreg["nom"] ;?></td>
<td><?php echo $enreg["prenom"] ;?></td>
<td><?php echo $enreg["date_naissance"]; ?></td>
<td><?php echo $enreg["email"]; ?></td>
<td><?php echo $enreg["telephone"]; ?></td>
</tr>
<?php } ?>
</table>
</center>
<?php
mysqli_close($conn);
?>
</body>
</html>