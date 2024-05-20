<?php
require 'config.php';

try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Affiche les erreurs de PDO
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Mode de récupération par défaut
        PDO::ATTR_EMULATE_PREPARES => false,  // Désactive l'émulation des requêtes préparées
    ];
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    die('Échec de la connexion : ' . $e->getMessage());
}
?>
