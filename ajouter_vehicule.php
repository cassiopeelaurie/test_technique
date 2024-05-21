<?php
// ajouter_vehicule.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation des données du formulaire
    $marque = $_POST["marque"];
    $modele = $_POST["modele"];

    // Insérer le nouveau véhicule dans la base de données
    // (vous devez avoir une connexion à la base de données établie ici)
    // Exemple :
    $sql = "INSERT INTO vehicules (marque, modele) VALUES (:marque, :modele)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['marque' => $marque, 'modele' => $modele]);

    // Redirection vers la page d'administration après l'ajout
    header("Location: admin.php");
    exit;
}
?>
