<?php
session_start();
require_once("connexion.php"); // Utilisation de require pour la sécurité

try {
    // Préparation et exécution de la requête
    $stmt = $pdo->query("SELECT nom_eleve FROM eleves");
    $eleves = $stmt->fetchAll();
} catch (Exception $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste déroulante Élèves</title>
    <style>
        /* Votre CSS reste identique, je le略 (omitted for brevity) */
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #ffafbd, #ffc3a0); height: 100vh; display: flex; justify-content: center; align-items: center; margin: 0; }
        select { appearance: none; background-color: white; border: 2px solid #ff6b81; border-radius: 12px; padding: 12px 40px 12px 20px; cursor: pointer; }
        button { margin-top: 15px; color: #95a5a6; padding: 8px 20px; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

<div style="text-align: center;">
    <?php if(isset($_SESSION["login"])): ?>
        <h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>
            La session est ouverte au nom de : <?php echo htmlspecialchars($_SESSION["login"]); ?><br>
            Vous êtes : <?php echo htmlspecialchars($_SESSION["profil"]); ?>
        </h4>
    <?php endif; ?>

    <select style="text-align: center; font-weight: bold;">
        <option value="">-- Choisissez un élève --</option>
        <?php foreach ($eleves as $enre): ?>
            <option>
                <?php echo htmlspecialchars($enre['nom_eleve']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <br>
    <a href="menu.php"><button>Retour</button></a>
</div>

</body>
</html>