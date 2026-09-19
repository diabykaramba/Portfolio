<?php
session_start();

// 1. Sécurité : Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["login"])) {
    header("Location: connexion.php");
    exit();
}

// 2. Connexion à la base de données (via l'objet $pdo défini dans connexion.php)
require_once("connexion.php");

try {
    // 3. Exécution de la requête
    $requete = "SELECT num_enseignant, nom_enseignant, adresse, num_telephone, photo FROM enseignants";
    $stmt = $pdo->query($requete);
    $enseignants = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En production, évitez d'afficher $e->getMessage() aux utilisateurs (loguez-le plutôt)
    die("Erreur lors de la récupération des enseignants.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Enseignants</title>
    <link rel="stylesheet" href="affichage.css">
</head>
<body>

    <header style="background-color: green; border-radius: 15px; padding: 10px; color: white; margin-bottom: 20px;">
        <h4>
            La session est ouverte au nom de : <?php echo htmlspecialchars($_SESSION["login"]); ?><br>
            Vous êtes : <?php echo htmlspecialchars($_SESSION["profil"]); ?>
        </h4>
    </header>

    <div style="width: 90%; margin: auto;">
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: center;">
            <thead style="background-color: #f2f2f2;">
                <tr>
                    <th>Numéro</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Photo</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enseignants as $enreg): ?>
                <tr>
                    <td><?php echo htmlspecialchars($enreg["num_enseignant"]); ?></td>
                    <td><?php echo htmlspecialchars($enreg["nom_enseignant"]); ?></td>
                    <td><?php echo htmlspecialchars($enreg["adresse"]); ?></td>
                    <td><?php echo htmlspecialchars($enreg["num_telephone"]); ?></td>
                    <td>
                        <?php if ($enreg['photo']): ?>
                            <img src="images/<?php echo htmlspecialchars($enreg['photo']); ?>" width="100" alt="Photo">
                        <?php else: ?>
                            <span>Pas de photo</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="supprimer_enseignant2.php?num_enseignant=<?php echo urlencode($enreg['num_enseignant']); ?>" 
                           onclick="return confirm('Voulez-vous vraiment supprimer cet enseignant ?')">Supprimer</a>
                    </td>
                    <td>
                        <a href="modifier_enseignant.php?num_enseignant=<?php echo urlencode($enreg['num_enseignant']); ?>">Modifier</a>
                    </td>
                    <td>
                        <a href="afficher_enseignant.php?num_enseignant=<?php echo urlencode($enreg['num_enseignant']); ?>">Afficher</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <p style="text-align: center; margin-top: 20px;">
        <a href="menu.php">Retour au menu</a>
    </p>

</body>
</html>