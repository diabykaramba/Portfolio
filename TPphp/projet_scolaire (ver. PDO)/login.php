<?php
session_start();
require_once("connexion.php");

$login_saisi = $_POST["login"] ?? '';
$mdp_saisi   = $_POST["mdp"] ?? '';

if (!empty($login_saisi) && !empty($mdp_saisi)) {
    try {
        // On récupère l'utilisateur par son login uniquement
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->execute(['login' => $login_saisi]);
        $user = $stmt->fetch();

        // Vérification du mot de passe haché
        if ($user && password_verify($mdp_saisi, $user['mdp'])) {
            // Authentification réussie
            $_SESSION["login"] = $user["login"];
            $_SESSION["profil"] = $user["profil"];
            header("Location: menu.php");
            exit();
        } else {
            // Identifiants incorrects
            header("Location: index.php?erreur=1");
            exit();
        }
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>