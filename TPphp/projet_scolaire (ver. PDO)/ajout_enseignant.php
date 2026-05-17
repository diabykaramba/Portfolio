<?php
session_start();
require_once("connexion.php"); // On utilise $pdo défini dans votre fichier de connexion

// 1. Récupération et nettoyage de base des données POST
$num       = $_POST["num_enseignant"] ?? '';
$nom       = $_POST["nom_enseignant"] ?? '';
$adresse   = $_POST["adresse"] ?? '';
$telephone = $_POST["num_telephone"] ?? '';

// 2. Gestion sécurisée du fichier (Image)
$file_name = $_FILES['file']['name'] ?? '';
$file_tmp  = $_FILES['file']['tmp_name'] ?? '';
$error     = $_FILES['file']['error'] ?? UPLOAD_ERR_NO_FILE;

if ($error === UPLOAD_ERR_OK) {
    // On définit le chemin de destination
    $path = "images/" . basename($file_name); 

    try {
        // 3. REQUÊTE PRÉPARÉE : Protection contre l'injection SQL
        $sql = "INSERT INTO enseignants (num_enseignant, nom_enseignant, adresse, num_telephone, photo) 
                VALUES (:num, :nom, :adresse, :tel, :photo)";
        
        $stmt = $pdo->prepare($sql);
        
        // 4. Exécution avec liaison des paramètres
        $success = $stmt->execute([
            'num'     => $num,
            'nom'     => $nom,
            'adresse' => $adresse,
            'tel'     => $telephone,
            'photo'   => $file_name
        ]);

        if ($success && move_uploaded_file($file_tmp, $path)) {
            echo "Enseignant ajouté avec succès.";
        } else {
            echo "Erreur lors de l'enregistrement ou du transfert de l'image.";
        }

    } catch (PDOException $e) {
        // En production, ne pas afficher $e->getMessage() pour ne pas dévoiler la structure de la BDD
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else {
    echo "Erreur de chargement de l'image (Code erreur : $error).";
}

echo '<br><center><a href="menu.php">Retour</a></center>';
?>