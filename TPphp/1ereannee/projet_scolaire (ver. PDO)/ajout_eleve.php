<?php
require_once("connexion.php");

// On récupère les données proprement
$num = $_POST["num_eleve"] ?? '';
$nom = $_POST["nom_eleve"] ?? '';
$adr = $_POST["adresse"] ?? '';
$tel = $_POST["num_telephone"] ?? '';

// Gestion sécurisée de l'image
$file_name = $_FILES['file']['name'];
$tmp_name  = $_FILES['file']['tmp_name'];
$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
$allowed   = ['jpg', 'jpeg', 'png', 'gif'];

if (in_array($extension, $allowed)) {
    $path = "images/" . basename($file_name);
    
    if (move_uploaded_file($tmp_name, $path)) {
        try {
            $sql = "INSERT INTO eleves (num_eleve, nom_eleve, adresse, num_telephone, photo) 
                    VALUES (:num, :nom, :adr, :tel, :photo)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'num'   => $num,
                'nom'   => $nom,
                'adr'   => $adr,
                'tel'   => $tel,
                'photo' => $file_name
            ]);
            echo "Étudiant ajouté avec succès.";
        } catch (Exception $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
        }
    } else {
        echo "Erreur de chargement de l'image.";
    }
} else {
    echo "Format de fichier non autorisé.";
}

echo '<br><a href="menu.php">Retour</a>';
?>