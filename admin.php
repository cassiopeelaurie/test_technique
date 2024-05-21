<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
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

</body>
</html>
