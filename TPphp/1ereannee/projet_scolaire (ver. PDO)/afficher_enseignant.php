<?php
session_start();
// Utilisation de require_once pour s'assurer que la connexion est indispensable
require_once("connexion.php"); 

// Récupération sécurisée du paramètre GET
$code = isset($_GET['num_enseignant']) ? $_GET['num_enseignant'] : null;
$enreg = null;

if ($code) {
    try {
        // PREPARATION DE LA REQUETE (Sécurité SQL)
        $stmt = $pdo->prepare("SELECT * FROM enseignants WHERE num_enseignant = :num");
        $stmt->execute(['num' => $code]);
        // On récupère toutes les lignes correspondantes
        $enseignants = $stmt->fetchAll();
    } catch (Exception $e) {
        die("Erreur lors de la récupération : " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations Enseignant</title>
    <link rel="stylesheet" href="affichage.css">
</head>
<body>
    <?php if (isset($_SESSION["login"])): ?>
        <h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>
            La session est ouverte au nom de : <?php echo htmlspecialchars($_SESSION["login"]); ?><br>
            Vous êtes : <?php echo htmlspecialchars($_SESSION["profil"]); ?>
        </h4>
    <?php endif; ?>

    <center>
        <h1>Voici les informations concernant l'enseignant :</h1>
        
        <?php if (!empty($enseignants)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($enseignants as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["num_enseignant"]); ?></td>
                        <td><?php echo htmlspecialchars($row["nom_enseignant"]); ?></td>
                        <td><?php echo htmlspecialchars($row["adresse"]); ?></td>
                        <td><?php echo htmlspecialchars($row["num_telephone"]); ?></td>
                        <td>
                            <?php if (!empty($row['photo'])): ?>
                                <img src="images/<?php echo htmlspecialchars($row['photo']); ?>" width="100px" alt="Photo">
                            <?php else: ?>
                                Pas de photo
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun enseignant trouvé avec ce numéro.</p>
        <?php endif; ?>

        <br>
        <a href="menu.php">Retour</a>
    </center>
</body>
</html>