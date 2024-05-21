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
    <style>
        /* Styles CSS pour le formulaire */
        .btn-admin {
            display: block;
            width: 5%;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-admin:hover {
            background-color: #45a049;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="date"] {
            width: 20%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 10%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Styles CSS pour les cartes de résultat */
        #resultats {
            text-align: center;
        }

        .card {
            width: 30%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin: 16px 20px 16px 0;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
    </style>
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
        <label for="prix_max">Prix maximum :</label>
    <input type="number" id="prix_max" name="prix_max" step="0.01" required>
    <br>
        <button type="submit">Rechercher</button>
    </form>

    <!-- Déplacer cette div en dessous du formulaire -->
    <div id="resultats">
        <!-- Les résultats de la recherche seront affichés ici -->
    </div>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            let dateDebut = document.getElementById('date_debut').value;
            let dateFin = document.getElementById('date_fin').value;
            let prixMax = document.getElementById('prix_max').value;
            let resultatsDiv = document.getElementById('resultats');

            fetch(`recherches.php?date_debut=${dateDebut}&date_fin=${dateFin}&prix_max=${prixMax}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    resultatsDiv.innerHTML = data;
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    resultatsDiv.innerHTML = '<p>Une erreur s\'est produite lors de la recherche.</p>';
                });
        });
    </script>
  <a href="admin.php" class="btn-admin">Admin</a>
</body>
</html>
