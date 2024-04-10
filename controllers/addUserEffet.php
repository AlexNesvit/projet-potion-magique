<?php
session_start();
require_once '../config/db.php'; // Inclure le fichier de configuration de la base de données
require_once '../core/functions.php'; // Inclure le fichier de fonctions

if(isset($_POST['submitEffet'])){
   $nomError = validateNotEmpty($_POST['nomEffet'], 'nom') ?: validateIngredientName($_POST['nomEffet']); // Validation du nom de l'effet
    $descriptionError = validateNotEmpty($_POST['descriptionEffet'], 'description') ?: validateIngredientPropriete($_POST['descriptionEffet']); // Validation de la description
    $dureeError = validateNotEmpty($_POST['dureeEffet'], 'duree'); // Validation de la durée

    $dureeInput = $_POST['dureeEffet'].' '.$_POST['uniteDureeEffet'];
    $dureeInputError = validateEffetDuree($dureeInput); // Validation de la durée

    if ($nomError || $descriptionError || $dureeError || $dureeInputError) { // Si une erreur est survenue
        $_SESSION['flash']['danger'] = $nomError ?: ($descriptionError ?: $dureeError); // Enregistrement du message d'erreur dans la session
        header('Location: ../user/profil'); // Redirection vers la page de profil
        exit; // Arrêt du script
    }
    $validateEffetExistsError = validateEffetExists($_POST['nomEffet']); // Validation de l'existence de l'effet
    if ($validateEffetExistsError) { // Si une erreur est survenue
        $_SESSION['flash']['danger'] = $validateEffetExistsError; // Enregistrement du message d'erreur dans la session
        header('Location: ../user/profil'); // Redirection vers la page de profil
        exit; // Arrêt du script
    }else{
        $effetId = addEffet($_POST['nomEffet'], $_POST['descriptionEffet'], $dureeInput); // Création de l'effet
        if ($effetId) { // Si l'effet est créé
            $_SESSION['flash']['success'] = "L'effet " . $_POST['nomEffet'] . " a bien été ajouté !"; // Enregistrement du message de succès dans la session
            header('Location: ../user/profil'); // Redirection vers la page de profil
            exit; // Arrêt du script
        } else {
            $_SESSION['flash']['danger'] = "Une erreur s'est produite lors de l'ajout de l'effet."; // Enregistrement du message d'erreur dans la session
            header('Location: ../user/profil'); // Redirection vers la page de profil
            exit; // Arrêt du script
        }
    }
}