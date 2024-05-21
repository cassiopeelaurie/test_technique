<?php
// index.php

include __DIR__ . '/includes/db.php';

include 'recherches.php';
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
    <form id="searchForm">
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

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            let dateDebut = document.getElementById('date_debut').value;
            let dateFin = document.getElementById('date_fin').value;
            let resultatsDiv = document.getElementById('resultats');

            fetch(`recherches.php?date_debut=${dateDebut}&date_fin=${dateFin}`)
                .then(response => response.text())
                .then(data => {
                    resultatsDiv.innerHTML = data;
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    resultatsDiv.innerHTML = '<p>Une erreur s\'est produite lors de la recherche.</p>';
                });
        });
    </script>
</body>
</html>
