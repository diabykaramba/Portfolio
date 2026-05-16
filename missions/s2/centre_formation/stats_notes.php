<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stats notes</title>
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
    <h1>Statistiques notes</h1>
    <p><a href="stats_notes1.php">Moyenne générale des notes</a></p>
    <p><a href="stats_notes2.php">Note maximale et minimale</a></p>
    <p><a href="stats_notes3.php">Moyenne par étudiant</a></p>
    <p><a href="stats_notes4.php">Étudiants ayant eu une note supérieure à 12/20</a></p>
</div>

</body>
</html>
