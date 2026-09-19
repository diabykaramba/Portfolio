<?php
// Page d'accueil avec menu simple
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion de la bibliothèque</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .menu {
            color: white;
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

<div class="menu">
    <label>Accueil<label>

</div>

<div class="content">
    <h1>Gestion de la bibliothèque</h1>
    <center>
    <h2><a href="adherents.php">Liste des adhérents</a></h2>
    <h2><a href="auteurs.php">Liste des auteurs</a></h2>
    <h2><a href="disponible.php">Liste des livres toujours disponibles</a></h2>
    <h2><a href="inscrit2020.php">Liste des adhérents inscrits avant 2020</a></h2>
    <h2><a href="emprunter-decembre.php">Liste des emprunts effectués en décembre 2025</a></h2>
    <h2><a href="romans.php">Liste des livres du genre Roman</a></h2>
    <center>
</div>

</body>
</html>
