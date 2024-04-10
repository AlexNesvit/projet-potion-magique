<?php
session_start();
require '../core/functions.php';
require '../config/db.php';

$userId = $_GET['id'] ?? null;
if ($userId && is_numeric($userId)) {
    if (deleteUser($userId)) {
        $_SESSION['flash']['success'] = "Utilisateur supprimé avec succès.";
    } else {
        $_SESSION['flash']['danger'] = "Vous n'avez pas les droits nécessaires ou une erreur s'est produite.";
    }
} else {
    $_SESSION['flash']['danger'] = "ID utilisateur non spécifié ou invalide.";
}

header('Location: ../admin/admin'); // Rediriger où cela est approprié