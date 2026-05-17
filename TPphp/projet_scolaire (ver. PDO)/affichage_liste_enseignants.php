<?php
session_start();
require_once("connexion.php");

try {
    $stmt = $pdo->query("SELECT nom_enseignant FROM enseignants");
    $enseignants = $stmt->fetchAll();
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste déroulante Enseignants</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #ffafbd, #ffc3a0); height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: 0; }
        select { border: 2px solid #ff6b81; border-radius: 12px; padding: 12px 20px; }
        button { margin-top: 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <?php if(isset($_SESSION["login"])): ?>
        <h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white; text-align: center;'>
            La session est ouverte au nom de : <?php echo htmlspecialchars($_SESSION["login"]); ?><br>
            Vous êtes : <?php echo htmlspecialchars($_SESSION["profil"]); ?>
        </h4>
    <?php endif; ?>

    <select style="text-align: center; font-weight: bold;">
        <option value="">-- Choisissez un enseignant --</option>
        <?php foreach ($enseignants as $enre): ?>
            <option>
                <?php echo htmlspecialchars($enre['nom_enseignant']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br>
    <a href="menu.php"><button>Retour</button></a>

</body>
</html>