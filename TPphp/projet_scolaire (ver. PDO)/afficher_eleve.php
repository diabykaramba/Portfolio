<?php
session_start();
require_once("connexion.php");

// Sécurité : on vérifie si le paramètre existe
$code = $_GET['num_eleve'] ?? null;

if ($code) {
    // Utilisation d'une requête préparée pour éviter les injections SQL
    $stmt = $pdo->prepare("SELECT * FROM eleves WHERE num_eleve = ?");
    $stmt->execute([$code]);
    $eleve = $stmt->fetch();
}
?>
<html>
<head>
    <title>Détails Élève</title>
    <link rel="stylesheet" href="affichage.css">
</head>
<body>
    <h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>
        La session est ouverte au nom de: <?php echo htmlspecialchars($_SESSION["login"]); ?><br>
        Vous êtes: <?php echo htmlspecialchars($_SESSION["profil"]); ?>
    </h4>

    <center>
        <h1>Informations concernant l'élève</h1>
        <?php if ($eleve): ?>
        <table border="1">
            <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Photo</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($eleve["num_eleve"]) ?></td>
                <td><?= htmlspecialchars($eleve["nom_eleve"]) ?></td>
                <td><?= htmlspecialchars($eleve["adresse"]) ?></td>
                <td><?= htmlspecialchars($eleve["num_telephone"]) ?></td>
                <td><img src="images/<?= htmlspecialchars($eleve['photo']) ?>" width="100px"></td>
            </tr>
        </table>
        <?php else: ?>
            <p>Aucun élève trouvé.</p>
        <?php endif; ?>
        <br>
        <a href="menu.php">Retour</a>
    </center>
</body>
</html>