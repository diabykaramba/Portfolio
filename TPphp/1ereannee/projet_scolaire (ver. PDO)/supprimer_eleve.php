<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression Élève</title>
</head>
<body>
    <?php
    require_once("connexion.php"); //

    // Récupération sécurisée du numéro
    $c = $_POST['num'] ?? '';

    if (!empty($c)) {
        try {
            // Requête préparée pour la sécurité
            $stmt = $pdo->prepare("DELETE FROM eleves WHERE num_eleve = :num");
            $stmt->execute(['num' => $c]);

            // Vérification si une ligne a été impactée
            if ($stmt->rowCount() > 0) {
                echo "<center><h1>Suppression effectuée</h1></center>";
            } else {
                echo "<center><h1>Aucun élève trouvé avec ce numéro</h1></center>";
            }
        } catch (PDOException $e) {
            echo "<center><h1>Échec de la suppression</h1></center>";
            // Ne pas afficher $e->getMessage() en production pour la sécurité
        }
    }

    echo '<center><a href="menu.php">Retour</a></center>';
    ?>
</body>
</html>