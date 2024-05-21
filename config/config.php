<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if (!defined('DB_HOST')) {
    define('DB_HOST', $_ENV['DB_HOST']);
}

if (!defined('DB_NAME')) {
    define('DB_NAME', $_ENV['DB_NAME']);
}

if (!defined('DB_USER')) {
    define('DB_USER', $_ENV['DB_USER']);
}

if (!defined('DB_PASS')) {
    define('DB_PASS', $_ENV['DB_PASS']);
}
?>
