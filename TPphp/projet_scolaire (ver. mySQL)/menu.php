
<?php
session_start();
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

    <!-- Onglet Gestion des élèves -->
    <div id="eleves" class="tabcontent">
        <h2>Gestion des élèves</h2>
<div class="bienvenue">
    <?php
   
    echo "<h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>La session est ouverte au nom de: ".$_SESSION["login"]."<br>";
    echo "Vous êtes: ".$_SESSION["profil"]."</h4>";
    
    ?>
</div>



    <br>
        <a href="affichage_eleves.php">
            <button class="action-btn">Tableau des élèves</button>
        </a>
        <br>
        <a href="affichage_liste.php">
            <button class="action-btn">Liste déroulante des élèves</button>
        </a>

        <br>
        <br>
        <a href="ajout_eleve.html">
        <button class="action-btn">Ajouter un élève</button>
        </a>
        <br>
        <!-- Page permettant de rechercher un élève par son numéro, puis modifier ses informations (sauf son num élève) -->
        <a href="affichage_numero.php">
        <button class="action-btn">Modifier un élève</button>
        </a>
        <br>
        <br>
        <a href="supprimer_eleve.html">
        <button class="supprimer">Supprimer un élève</button>
        </a>
    </div>

    <!-- Onglet Gestion des enseignants -->
        <div id="enseignants" class="tabcontent">
        <h2>Gestion des enseignants</h2>
        
        <div class="bienvenue">
        <?php
        echo "<h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>La session est ouverte au nom de: ".$_SESSION["login"]."<br>";
        echo "Vous êtes: ".$_SESSION["profil"]."</h4>";
        ?>
        </div>
        <a href="affichage_enseignants.php">
        <button class="action-btn">Tableau des enseignants</button>
        </a>
        <br>
        <a href="affichage_liste_enseignants.php">
        <button class="action-btn">Liste déroulante des enseignants</button>
        </a>
        <br><br>
        <a href="ajout_enseignant.html">
        <button class="action-btn">Ajouter un enseignant</button>
        </a>
        <br>
        <a href="affichage_numero_enseignants.php">
        <button class="action-btn">Modifier un enseignant</button>
        </a>
        <br><br>
        <a href="supprimer_enseignant.html">
        <button class="supprimer">Supprimer un enseignant</button>
        </a>
    </div>

    <!-- Onglet Statistiques -->
    <div id="statistiques" class="tabcontent">
        <h2>Statistiques</h2>
        <p>Voici quelques statistiques sur notre établissement</p>
        <ul>
            <li>Nombre d’élèves inscrits:
                <?php
                @include("connexion.php");
                $req1 = "SELECT COUNT(*) FROM eleves";
                $res1 = mysqli_query($conn, $req1);
                $row1 = mysqli_fetch_row($res1);
                echo $row1[0];
                
                ?>
            </li>
            <li>Nombre d’enseignants:
                <?php
                @include("connexion.php");
                $req2 = "SELECT COUNT(*) FROM enseignants";
                $res2 = mysqli_query($conn, $req2);
                $row2 = mysqli_fetch_row($res2);
                echo $row2[0];
                
                ?>
                </li>
            <li>...</li>
        </ul>
    </div>

    <script>
        function openTab(tabName) {
            let tabs = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }

        // afficher l’onglet élèves par défaut
        openTab('eleves');
    </script>

</body>
</html>
