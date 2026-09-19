<?php
session_start();
// Sécurité : si la session n'existe pas, on redirige vers l'index
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit();
}
require_once("connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>

    <div class="menu">
        <button onclick="openTab('eleves')">Gestion des élèves</button>
        <button onclick="openTab('enseignants')">Gestion des enseignants</button>
        <button onclick="openTab('statistiques')">Statistiques</button>
        <a href="logout.php"><button class="logout">Déconnexion</button></a>
    </div>

    <div id="eleves" class="tabcontent">
        <h2>Gestion des élèves</h2>
        <div class="bienvenue">
            <h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>
                La session est ouverte au nom de: <?= htmlspecialchars($_SESSION["login"]) ?><br>
                Vous êtes: <?= htmlspecialchars($_SESSION["profil"]) ?>
            </h4>
        </div>
        <br>
        <a href="affichage_eleves.php"><button class="action-btn">Tableau des élèves</button></a><br>
        <a href="affichage_liste.php"><button class="action-btn">Liste déroulante des élèves</button></a><br><br>
        <a href="ajout_eleve.html"><button class="action-btn">Ajouter un élève</button></a><br>
        <a href="affichage_numero.php"><button class="action-btn">Modifier un élève</button></a><br><br>
        <a href="supprimer_eleve.html"><button class="supprimer">Supprimer un élève</button></a>
    </div>

    <div id="enseignants" class="tabcontent" style="display:none;">
        <h2>Gestion des enseignants</h2>
        <div class="bienvenue">
            <h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>
                La session est ouverte au nom de : <?= htmlspecialchars($_SESSION["login"]) ?><br>
                Vous êtes : <?= htmlspecialchars($_SESSION["profil"]) ?>
            </h4>
        </div>
        <br>
        <a href="affichage_enseignants.php"><button class="action-btn">Tableau des enseignants</button></a><br>
        <a href="affichage_liste_enseignants.php"><button class="action-btn">Liste déroulante des enseignants</button></a><br><br>
        <a href="ajout_enseignant.html"><button class="action-btn">Ajouter un enseignant</button></a><br>
        <a href="affichage_numero_enseignants.php"><button class="action-btn">Modifier un enseignant</button></a><br><br>
        <a href="supprimer_enseignant.html"><button class="supprimer">Supprimer un enseignant</button></a>
    </div>

    <div id="statistiques" class="tabcontent">
        <h2>Statistiques</h2>
        <ul>
            <li>Nombre d’élèves : 
                <?php 
                echo $pdo->query("SELECT COUNT(*) FROM eleves")->fetchColumn(); 
                ?>
            </li>
            <li>Nombre d’enseignants : 
                <?php 
                echo $pdo->query("SELECT COUNT(*) FROM enseignants")->fetchColumn(); 
                ?>
            </li>
        </ul>
    </div>

    <script>
        function openTab(tabName) {
            let tabs = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabs.length; i++) { tabs[i].style.display = "none"; }
            document.getElementById(tabName).style.display = "block";
        }
        openTab('eleves');
    </script>
</body>
</html>