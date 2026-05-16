<?php
session_start();

$host = "localhost";
$user = "root";
$password = "mysql";
$database = "centre_formation";

$conn = mysqli_connect($host, $user, $password, $database);
$requete = "SELECT nom FROM `etudiants`";
$resultat = mysqli_query($conn, $requete);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>
<html>
<head>
    <meta charset="UTF-8">
 </head>
<body>
    <?php
echo "<p style='float: left; position: absolute; top: -14px; font-weight: bold;'>Bienvenue ".$_SESSION["login"]."<br>";
echo "Rôle: ".$_SESSION["role"]."</p>";    
?>

<a href="logout.php" style='float: right; position: relative; top: -2px;';><button>Déconnexion</button></a>

<br>

<center>
<form action="recherche33.php" method="POST">
<select name="s1" style="text-align: center; font-weight: bold;">
<option value=""> -- Choississez un étudiant --</option>
<?php
$i = 1;
while($enre = mysqli_fetch_array($resultat))
    {

?>
<option><?php echo ($enre['nom']) ?></option>
<?php
$i++;
    }?>

</select>
<input type="submit" name="b1" value="Rechercher l'étudiant">
</form>

<?php mysqli_close($conn)?>
</center>
</body>
</html>