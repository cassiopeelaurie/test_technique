<?php
// admin.php

// Inclure le fichier de configuration de la base de données
require __DIR__ . '/includes/db.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface d'Administration</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Style CSS pour le titre */
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Style CSS pour le formulaire */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="date"],
        form select {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button[type="submit"]:hover {
            background-color: #005f6b;
        }

        .btn-client {
            display: block;
            width: 5%;
            margin: 20px auto;
            padding: 10px;
            background-color: #008CBA;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-client:hover {
            background-color: #005f6b;
        }

        /* Style CSS pour les cards */
        .card {
            width: 20%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 8px;
            margin: 16px 20px 16px 0;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .card img {
            max-width: 50%; 
            height: auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Interface d'Administration</h1>

    <h2>Ajouter un véhicule</h2>
    <form action="ajouter_vehicule.php" method="post">
        <label for="marque">Marque :</label>
        <input type="text" id="marque" name="marque" required>
        <br>
        <label for="modele">Modèle :</label>
        <input type="text" id="modele" name="modele" required>
        <br>
        <label for="prix_journalier">Prix journalier :</label>
        <input type="text" id="prix_journalier" name="prix_journalier" required>
        <br>
        <label for="date_debut">Date de début de disponibilité :</label>
        <input type="date" id="date_debut" name="date_debut" required>
        <br>
        <label for="date_fin">Date de fin de disponibilité :</label>
        <input type="date" id="date_fin" name="date_fin" required>
        <br>
        <button type="submit">Ajouter Véhicule</button>
    </form>

    <h2>Modifier les disponibilités</h2>
    <form action="modifier_disponibilites.php" method="post">
        <label for="vehicule_id">ID du véhicule :</label>
        <input type="text" id="vehicule_id" name="vehicule_id" required>
        <br>
        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut" required>
        <br>
        <label for="date_fin">Date de fin :</label>
        <input type="date" id="date_fin" name="date_fin" required>
        <br>
        <button type="submit">Modifier Disponibilités</button>
    </form>

    <h2>Supprimer un véhicule</h2>
    <form action="supprimer_vehicule.php" method="post">
        <label for="vehicule_id">Sélectionnez le véhicule à supprimer :</label>
        <select id="vehicule_id" name="vehicule_id" required>
        <?php
        // Récupérer les véhicules depuis la base de données
        // Remplacer $pdo avec votre connexion à la base de données
        $sql = "SELECT id, marque, modele FROM vehicules";
        $stmt = $pdo->query($sql);
        $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($vehicules as $vehicule) {
            echo "<option value='" . $vehicule['id'] . "'>" . $vehicule['marque'] . " " . $vehicule['modele'] . "</option>";
        }
        ?>
        </select>
        <button type="submit">Supprimer</button>
    </form>

    <a href="index.php" class="btn-client">Client</a>
</body>
</html
