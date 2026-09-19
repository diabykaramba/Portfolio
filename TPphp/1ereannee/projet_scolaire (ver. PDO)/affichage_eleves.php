<?php
session_start();

// 1. Vérification de la session pour la sécurité (on ne veut pas d'accès non autorisé)
if (!isset($_SESSION["login"])) {
    header("Location: connexion.php");
    exit();
}

// 2. Inclusion de la connexion (doit maintenant utiliser PDO)
require_once("connexion.php"); 

try {
    // 3. Préparation et exécution de la requête avec PDO
    $requete = "SELECT num_eleve, nom_eleve, adresse, num_telephone, photo FROM eleves";
    $stmt = $pdo->query($requete);
    $eleves = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau des élèves</title>
    <link rel="stylesheet" href="affichage.css">
</head>
<body>

    <header style="background-color: green; border-radius: 15px; padding: 10px; color: white;">
        <h4>
            La session est ouverte au nom de : <?php echo htmlspecialchars($_SESSION["login"]); ?><br>
            Vous êtes : <?php echo htmlspecialchars($_SESSION["profil"]); ?>
        </h4>
    </header>

    <main>
        <table border="1" style="margin: 20px auto; border-collapse: collapse;">
            <thead>
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
                <?php foreach ($eleves as $enreg): ?>
                <tr>
                    <td><?php echo htmlspecialchars($enreg["num_eleve"]); ?></td>
                    <td><?php echo htmlspecialchars($enreg["nom_eleve"]); ?></td>
                    <td><?php echo htmlspecialchars($enreg["adresse"]); ?></td>
                    <td><?php echo htmlspecialchars($enreg["num_telephone"]); ?></td>
                    <td>
                        <?php if ($enreg['photo']): ?>
                            <img src="images/<?php echo htmlspecialchars($enreg['photo']); ?>" width="100" alt="Photo">
                        <?php endif; ?>
                    </td>
                    <td><a href="supprimer_eleve2.php?num_eleve=<?php echo urlencode($enreg['num_eleve']); ?>" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a></td>
                    <td><a href="modifier_eleve.php?num_eleve=<?php echo urlencode($enreg['num_eleve']); ?>">Modifier</a></td>
                    <td><a href="afficher_eleve.php?num_eleve=<?php echo urlencode($enreg['num_eleve']); ?>">Afficher</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="text-align: center;">
            <a href="menu.php">Retour au menu</a>
        </div>
    </main>

</body>
</html>