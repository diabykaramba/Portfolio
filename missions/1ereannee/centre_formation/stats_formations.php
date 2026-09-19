<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #7b7575; color: white;}
        .menu {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }
        .menu a {
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            display: inline-block;
        }
        .menu a:hover {
            background-color: #555;
        }
        .content {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<?php
echo "<p style='float: left; position: absolute; top: -14px; font-weight: bold;'>Bienvenue ".$_SESSION["login"]."<br>";
echo "Rôle: ".$_SESSION["role"]."</p>";    
?>

<a href="logout.php" style='float: right; position: relative; top: -2px;';><button>Déconnexion</button></a>

<br>

<div class="content">
    <h1>Statistiques formations</h1>
    <p><a href="stats_formations1.php">Nombre total de formations</a></p>
    <p><a href="stats_formations2.php">Nombre d'étudiants par formation</a></p>
    <p><a href="stats_formations3.php">Liste des formations</a></p>
</div>

</body>
</html>
