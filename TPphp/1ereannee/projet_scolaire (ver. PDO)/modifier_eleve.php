<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="affichage.css">
    <title>Modifier Élève</title>
</head>
<body>
<?php
    require_once("connexion.php");
    
    // Récupération sécurisée du paramètre
    $code = $_GET['num_eleve'] ?? '';

    if (!empty($code)) {
        try {
            // Requête préparée pour éviter l'injection SQL
            $stmt = $pdo->prepare("SELECT * FROM eleves WHERE num_eleve = :code");
            $stmt->execute(['code' => $code]);
            $enreg = $stmt->fetch();

            if ($enreg) {
                ?>
                <form action="update.php" method="post">
                    <label>Numéro :</label>
                    <input type="text" name="num_eleve" value="<?= htmlspecialchars($enreg['num_eleve']) ?>" readonly>
                    
                    <label>Nom :</label>
                    <input type="text" name="nom_eleve" value="<?= htmlspecialchars($enreg['nom_eleve']) ?>">
                    
                    <label>Adresse :</label>
                    <input type="text" name="adresse" value="<?= htmlspecialchars($enreg['adresse']) ?>">
                    
                    <label>Téléphone :</label>
                    <input type="text" name="num_telephone" value="<?= htmlspecialchars($enreg['num_telephone']) ?>">
                    
                    <input type="submit" value="Modifier">
                    <br><a href="affichage_eleves.php">Retour</a>
                </form>
                <?php
            } else {
                echo "<p>Élève non trouvé.</p>";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
?>
</body>
</html>