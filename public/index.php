<?php
// index.php
include 'includes/db.php';
include 'recherche.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Véhicules</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Recherche de Véhicules Disponibles</h1>
    <form action="recherche.php" method="GET">
        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut" required>
        <br>
        <label for="date_fin">Date de fin :</label>
        <input type="date" id="date_fin" name="date_fin" required>
        <br>
        <button type="submit">Rechercher</button>
    </form>

    <div id="resultats">
        <!-- Les résultats de la recherche seront affichés ici -->
    </div>
</body>
</html>