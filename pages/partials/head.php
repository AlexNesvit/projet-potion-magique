<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Récupération du nom de la page actuelle
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($currentPage === 'index.php') : ?> <!-- Vérification de la page actuelle pour ajouter le titre -->   
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"> <!-- Inclusion du fichier bootstrap -->
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Inclusion du fichier de style -->
    <?php else :?>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css"> <!-- Inclusion du fichier bootstrap -->
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Inclusion du fichier de style -->
    <?php endif; ?>
    <title><?= $title ?></title> <!-- Affichage du titre de la page -->
</head>
<body>