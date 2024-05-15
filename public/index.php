<?php

use App\Kernel;

// Cette ligne inclut l'autoloader généré par Composer.
// Il permet de charger automatiquement les classes de votre application et les dépendances.
require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

// La fonction anonyme retourne une instance du Kernel de l'application.
// Le contexte (array $context) contient des variables d'environnement telles que APP_ENV et APP_DEBUG.
return function (array $context) {
    // Création et retour d'une instance du Kernel avec les variables d'environnement.
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
