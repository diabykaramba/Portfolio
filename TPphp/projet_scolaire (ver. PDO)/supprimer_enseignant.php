<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression Enseignant</title>
</head>
<body>
    <?php
    require_once("connexion.php");

    $c = $_POST['num'] ?? '';

    if (!empty($c)) {
        try {
            // Utilisation d'un paramètre lié pour la sécurité SQL
            $stmt = $pdo->prepare("DELETE FROM enseignants WHERE num_enseignant = :num");
            $stmt->execute(['num' => $c]);

            if ($stmt->rowCount() > 0) {
                echo "<center><h1>Suppression effectuée</h1></center>";
            } else {
                echo "<center><h1>Aucun enseignant trouvé avec ce numéro</h1></center>";
            }
        } catch (PDOException $e) {
            echo "<center><h1>Échec de la suppression</h1></center>";
        }
    }

    echo '<center><a href="menu.php">Retour</a></center>';
    ?>
</body>
</html>