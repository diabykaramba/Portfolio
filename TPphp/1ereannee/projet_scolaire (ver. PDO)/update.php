<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mise à jour</title>
</head>
<body>
<?php
    require_once('connexion.php');

    try {
        if (isset($_POST['num_eleve'])) {
            // Mise à jour ÉLÈVE
            $sql = "UPDATE eleves SET nom_eleve = :nom, adresse = :adr, num_telephone = :tel WHERE num_eleve = :num";
            $params = [
                'nom' => $_POST['nom_eleve'],
                'adr' => $_POST['adresse'],
                'tel' => $_POST['num_telephone'],
                'num' => $_POST['num_eleve']
            ];
        } elseif (isset($_POST['num_enseignant'])) {
            // Mise à jour ENSEIGNANT
            $sql = "UPDATE enseignants SET nom_enseignant = :nom, adresse = :adr, num_telephone = :tel WHERE num_enseignant = :num";
            $params = [
                'nom' => $_POST['nom_enseignant'],
                'adr' => $_POST['adresse'],
                'tel' => $_POST['num_telephone'],
                'num' => $_POST['num_enseignant']
            ];
        }

        if (isset($sql)) {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            echo "Modification effectuée avec succès";
        } else {
            echo "Aucune donnée reçue.";
        }

    } catch (PDOException $e) {
        echo "Échec de la modification : " . htmlspecialchars($e->getMessage());
    }

    echo '<br><a href="menu.php">Retour</a>';
?>
</body>
</html>