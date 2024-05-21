<?php
// modifier_disponibilites.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation des données du formulaire
    $vehicule_id = $_POST["vehicule_id"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];

    $sql = "UPDATE disponibilites SET date_debut = :date_debut, date_fin = :date_fin WHERE vehicule_id = :vehicule_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['date_debut' => $date_debut, 'date_fin' => $date_fin, 'vehicule_id' => $vehicule_id]);

    // Redirection vers la page d'administration après la modification
    header("Location: admin.php");
    exit;
}
?>
