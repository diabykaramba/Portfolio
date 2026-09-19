<?php
require_once("connexion.php"); //

// Récupération du paramètre dans l'URL
$code = $_GET['num_eleve'] ?? '';

if (!empty($code)) {
    try {
        // Exécution sécurisée de la suppression
        $stmt = $pdo->prepare("DELETE FROM eleves WHERE num_eleve = :num");
        $stmt->execute(['num' => $code]);
    } catch (PDOException $e) {
        // On pourrait loguer l'erreur ici
    }
}

// Redirection immédiate vers la liste
header('Location: affichage_eleves.php'); //
exit; //
?>