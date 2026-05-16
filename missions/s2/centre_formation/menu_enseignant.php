<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
            background-color: #7b7575;
            color: white;
        
        }
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
    <h1>Centre de Formation</h1>
</div>

<div class="menu">
    <a href="stats_etudiants.php">Statistiques étudiants</a>
</div>

<div class="content">
    <h2>Recherche</h2>
</div>

<div class="menu">
    <a href="recherche_classique.php">Recherche par ID</a>
    <a href="recherche_liste.php">Recherche par liste</a>
</div>

</body>
</html>
