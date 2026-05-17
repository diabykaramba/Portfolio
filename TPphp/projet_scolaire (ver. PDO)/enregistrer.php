<?php
require_once("connexion.php"); //

// Récupération des données
$login  = $_POST["login"] ?? '';
$profil = $_POST["profil"] ?? '';
$mdp    = $_POST["mdp"] ?? '';

if (!empty($login) && !empty($mdp)) {
    try {
        // Hachage du mot de passe (Sécurité cruciale)
        $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);

        // Requête préparée PDO
        $sql = "INSERT INTO users (login, profil, mdp) VALUES (:login, :profil, :mdp)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            'login'  => $login,
            'profil' => $profil,
            'mdp'    => $mdp_hache // On enregistre la version chiffrée
        ]);

        echo "<center><p>Enregistrement effectué avec succès.</p></center>";
    } catch (PDOException $e) {
        echo "<center><p>Erreur lors de l'enregistrement : " . htmlspecialchars($e->getMessage()) . "</p></center>";
    }
} else {
    echo "<center><p>Veuillez remplir tous les champs.</p></center>";
}

echo '<center><a href="index.php">Retour</a></center>';
?>