<?php
session_start(); // Démarrage de la session
session_unset(); // Suppression des données de la session
session_destroy(); // Destruction de la session
header('Location: ../index.php?logout=success'); // Redirection vers la page d'accueil avec un message de déconnexion