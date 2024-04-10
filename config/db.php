<?php
require __DIR__ . '/../vendor/autoload.php'; // Inclusion de l'autoloader de Composer

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); // Création d'une instance de Dotenv
$dotenv->load(); // Chargement du fichier .env

$dbHost = $_ENV['DB_HOST']; // Récupération de la variable d'environnement DB_HOST
$dbName = $_ENV['DB_NAME']; // Récupération de la variable d'environnement DB_NAME
$dbUser = $_ENV['DB_USER']; // Récupération de la variable d'environnement DB_USER
$dbPass = $_ENV['DB_PASS']; // Récupération de la variable d'environnement DB_PASS

try{
$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName","$dbUser","$dbPass"); // Connexion à la base de données
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activation des erreurs PDO

} catch (PDOException $e){
echo "Erreur de connexion a la database " . $e->getMessage(); // Affichage de l'erreur
}