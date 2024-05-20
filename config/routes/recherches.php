<?php
// recherche.php
require 'includes/db.php';

// Dates de début et de fin de recherche (ces valeurs peuvent être dynamiques en fonction de vos besoins)
$date_debut = '2024-06-01';
$date_fin = '2024-06-10';

// Requête pour obtenir les véhicules disponibles entre les dates spécifiées
$sql = "SELECT v.id, v.marque, v.modele
        FROM vehicules v
        JOIN disponibilites d ON v.id = d.vehicule_id
        WHERE d.date_debut <= :date_fin AND d.date_fin >= :date_debut";

$stmt = $pdo->prepare($sql);
$stmt->execute(['date_debut' => $date_debut, 'date_fin' => $date_fin]);
$vehicules = $stmt->fetchAll();

if ($vehicules) {
    foreach ($vehicules as $vehicule) {
        echo 'ID: ' . $vehicule['id'] . '<br>';
        echo 'Marque: ' . $vehicule['marque'] . '<br>';
        echo 'Modèle: ' . $vehicule['modele'] . '<br><br>';
    }
} else {
    echo 'Aucun véhicule disponible pour cette période.';
}
?>
