<?php
// ajouter_vehicule.php

// Inclure le fichier de configuration de la base de données
require __DIR__ . '/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données nécessaires sont présentes
    if (isset($_POST["marque"], $_POST["modele"], $_POST["prix_journalier"], $_POST["date_debut"], $_POST["date_fin"])) {
        $marque = $_POST["marque"];
        $modele = $_POST["modele"];
        $prix_journalier = $_POST["prix_journalier"];
        $date_debut = $_POST["date_debut"];
        $date_fin = $_POST["date_fin"];

        // Commencer une transaction
        $pdo->beginTransaction();

        try {
            // Insérer le nouveau véhicule dans la base de données
            $sql = "INSERT INTO vehicules (marque, modele, prix_journalier) VALUES (:marque, :modele, :prix_journalier)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':marque' => $marque,
                ':modele' => $modele,
                ':prix_journalier' => $prix_journalier,
            ]);

            // Obtenir l'ID du véhicule nouvellement inséré
            $vehicule_id = $pdo->lastInsertId();

            // Insérer les disponibilités pour le nouveau véhicule
            $sql = "INSERT INTO disponibilites (vehicule_id, date_debut, date_fin) VALUES (:vehicule_id, :date_debut, :date_fin)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':vehicule_id' => $vehicule_id,
                ':date_debut' => $date_debut,
                ':date_fin' => $date_fin,
            ]);

            // Valider la transaction
            $pdo->commit();

            // Redirection vers la page d'administration après l'ajout
            header("Location: admin.php");
            exit;
        } catch (Exception $e) {
            // En cas d'erreur, annuler la transaction
            $pdo->rollBack();
            echo "Échec de l'ajout du véhicule : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
