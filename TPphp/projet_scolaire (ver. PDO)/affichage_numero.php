<?php
session_start();
require_once("connexion.php"); // On suppose que $pdo est défini ici

$enreg = null;
$d = "";

if (isset($_POST['num_eleve'])) {
    $d = $_POST['num_eleve'];
    try {
        // UTILISATION DE REQUÊTE PRÉPARÉE (Sécurité SQL)
        $stmt = $pdo->prepare("SELECT * FROM eleves WHERE num_eleve = :num");
        $stmt->execute(['num' => $d]);
        $enreg = $stmt->fetch();
    } catch (Exception $e) {
        $erreur = "Erreur de base de données.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modifier Élève</title>
    <style>
        /* Votre CSS reste identique */
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; padding: 20px; }
        center { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        form { display: flex; flex-direction: column; text-align: left; }
        input[type="text"] { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"] { background-color: #2ecc71; color: white; padding: 12px; border: none; cursor: pointer; font-weight: bold; }
        input[readonly] { background-color: #eee; }
    </style>
</head>
<body>

<?php if ($enreg): ?>
    <center>
        <h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>
            La session est ouverte au nom de : <?= htmlspecialchars($_SESSION["login"]) ?><br>
            Vous êtes : <?= htmlspecialchars($_SESSION["profil"]) ?>
        </h4>
        <p>Voici les informations concernant l'élève <strong><?= htmlspecialchars($d) ?></strong></p>
    </center>

    <center>
        <form action="update.php" method="POST">
            <label>Numéro :</label>
            <input type="text" name="num_eleve" value="<?= htmlspecialchars($enreg['num_eleve']) ?>" readonly>
            
            <label>Nom :</label>
            <input type="text" name="nom_eleve" value="<?= htmlspecialchars($enreg['nom_eleve']) ?>">
            
            <label>Adresse :</label>
            <input type="text" name="adresse" value="<?= htmlspecialchars($enreg['adresse']) ?>">
            
            <label>Téléphone :</label>
            <input type="text" name="num_telephone" value="<?= htmlspecialchars($enreg['num_telephone']) ?>">
            
            <input type="submit" name="modifier" value="Modifier les informations">
        </form>
        <a href="menu.php"><button>Retour</button></a>
    </center>

<?php else: ?>
    <center>
        <h4 style='background-color: green; border-radius: 15px; padding: 10px; color: white;'>
            La session est ouverte au nom de : <?= htmlspecialchars($_SESSION["login"]) ?>
        </h4>
        <form method="POST">
            <p>Veuillez entrer un numéro élève :</p>
            <input type="text" name="num_eleve" required><br>
            <input type="submit" name="envoyer_num" value="Envoyer">
        </form>
        <a href="menu.php"><button>Retour</button></a>
    </center>
<?php endif; ?>

</body>
</html>