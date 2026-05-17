<?php
require_once("connexion.php");

$code = $_GET['num_enseignant'] ?? '';

if (!empty($code)) {
    try {
        $stmt = $pdo->prepare("DELETE FROM enseignants WHERE num_enseignant = :num");
        $stmt->execute(['num' => $code]);
    } catch (PDOException $e) {
        // Log de l'erreur si nécessaire
    }
}

header('Location: affichage_enseignants.php');
exit;
?>