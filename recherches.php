<?php
// recherches.php
require __DIR__ . '/includes/db.php';

// Vérification des paramètres GET
if (isset($_GET['date_debut']) && isset($_GET['date_fin']) && isset($_GET['prix_max'])) {
    $date_debut = $_GET['date_debut'];
    $date_fin = $_GET['date_fin'];
    $prix_max = intval($_GET['prix_max']);

    // Calcul du nombre de jours entre les deux dates
    $datetime1 = new DateTime($date_debut);
    $datetime2 = new DateTime($date_fin);
    $interval = $datetime1->diff($datetime2);
    $nombre_jours = $interval->days + 1; // Ajouter 1 pour inclure le jour de début

    // Requête pour obtenir les véhicules disponibles exactement entre les dates spécifiées
    $sql = "SELECT v.id, v.marque, v.modele, v.prix_journalier
            FROM vehicules v
            JOIN disponibilites d ON v.id = d.vehicule_id
            WHERE d.date_debut = :date_debut AND d.date_fin = :date_fin";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'date_debut' => $date_debut,
        'date_fin' => $date_fin
    ]);
    $vehicules = $stmt->fetchAll();

    if ($vehicules) {
        $vehicules_filtrés = [];

        // Filtrer les véhicules en fonction du prix maximum
        foreach ($vehicules as $vehicule) {
            $cout_total = $vehicule['prix_journalier'] * $nombre_jours;

            if ($cout_total <= $prix_max) {
                $vehicule['cout_total'] = $cout_total;
                $vehicules_filtrés[] = $vehicule;
            }
        }

        if ($vehicules_filtrés) {
            foreach ($vehicules_filtrés as $vehicule) {
                echo '<div class="card">';
                echo '<img src="assets/voiture.jpg" alt="Voiture">';
                echo '<h2>' . htmlspecialchars($vehicule['marque']) . ' ' . htmlspecialchars($vehicule['modele']) . '</h2>';
                echo '<p>Prix journalier: ' . htmlspecialchars($vehicule['prix_journalier']) . ' €</p>';
                echo '<p>Coût total pour ' . $nombre_jours . ' jours: ' . htmlspecialchars($vehicule['cout_total']) . ' €</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Aucun véhicule disponible pour cette période et ce prix maximum.</p>';
        }
    } else {
        echo '<p>Aucun véhicule disponible pour cette période.</p>';
    }
}
?>
