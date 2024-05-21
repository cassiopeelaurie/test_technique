<?php
// supprimer_vehicule.php

// Inclure le fichier de configuration de la base de données
require __DIR__ . '/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si un véhicule a été sélectionné
    if (isset($_POST["vehicule_id"])) {
        $vehicule_id = $_POST["vehicule_id"];

        // Supprimer le véhicule de la base de données
        $sql = "DELETE FROM vehicules WHERE id = :vehicule_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['vehicule_id' => $vehicule_id]);

        // Redirection vers la page d'administration après la suppression
        header("Location: admin.php");
        exit;
    } else {
        echo "Veuillez sélectionner un véhicule à supprimer.";
    }
}
?>
