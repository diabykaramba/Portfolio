<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="affichage.css">
    <title>Modifier Enseignant</title>
</head>
<body>
<?php
    require_once("connexion.php");
    
    // Correction du paramètre GET pour correspondre à l'enseignant
    $code = $_GET['num_enseignant'] ?? '';

    if (!empty($code)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM enseignants WHERE num_enseignant = :code");
            $stmt->execute(['code' => $code]);
            $enreg = $stmt->fetch();

            if ($enreg) {
                ?>
                <form action="update.php" method="post">
                    <label>Numéro :</label>
                    <input type="text" name="num_enseignant" value="<?= htmlspecialchars($enreg['num_enseignant']) ?>" readonly>
                    
                    <label>Nom :</label>
                    <input type="text" name="nom_enseignant" value="<?= htmlspecialchars($enreg['nom_enseignant']) ?>">
                    
                    <label>Adresse :</label>
                    <input type="text" name="adresse" value="<?= htmlspecialchars($enreg['adresse']) ?>">
                    
                    <label>Téléphone :</label>
                    <input type="text" name="num_telephone" value="<?= htmlspecialchars($enreg['num_telephone']) ?>">
                    
                    <input type="submit" value="Modifier">
                    <br><a href="affichage_enseignants.php">Retour</a>
                </form>
                <?php
            } else {
                echo "<p>Enseignant non trouvé.</p>";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
?>
</body>
</html>