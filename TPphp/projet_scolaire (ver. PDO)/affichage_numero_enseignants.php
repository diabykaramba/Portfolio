<?php
session_start();
require_once("connexion.php");

$enreg = null;
$d = "";

if (isset($_POST['num_enseignant'])) {
    $d = $_POST['num_enseignant'];
    try {
        // Requête préparée pour les enseignants
        $stmt = $pdo->prepare("SELECT * FROM enseignants WHERE num_enseignant = :num");
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
    <title>Modifier Enseignant</title>
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
        <h4 style='background-color: #3498db; border-radius: 15px; padding: 10px; color: white;'>
            Session : <?= htmlspecialchars($_SESSION["login"]) ?> (<?= htmlspecialchars($_SESSION["profil"]) ?>)
        </h4>
        <p>Informations de l'enseignant n° <strong><?= htmlspecialchars($d) ?></strong></p>
    </center>

    <center>
        <form action="update_enseignant.php" method="POST">
            <label>Numéro Enseignant :</label>
            <input type="text" name="num_enseignant" value="<?= htmlspecialchars($enreg['num_enseignant']) ?>" readonly>
            
            <label>Nom :</label>
            <input type="text" name="nom_enseignant" value="<?= htmlspecialchars($enreg['nom_enseignant']) ?>">
            
            <label>Spécialité :</label>
            <input type="text" name="specialite" value="<?= htmlspecialchars($enreg['specialite'] ?? '') ?>">
            
            <input type="submit" name="modifier" value="Mettre à jour">
        </form>
        <a href="menu.php"><button>Retour</button></a>
    </center>

<?php else: ?>
    <center>
        <form method="POST">
            <p>Veuillez entrer un numéro enseignant :</p>
            <input type="text" name="num_enseignant" required><br>
            <input type="submit" value="Rechercher">
        </form>
        <a href="menu.php"><button>Retour</button></a>
    </center>
<?php endif; ?>

</body>
</html>