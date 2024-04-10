<?php
session_start();
require_once '../config/db.php'; // Inclure le fichier de configuration de la base de données
require_once '../core/functions.php'; // Inclure le fichier de fonctions

if (isset($_POST['submit'])) { // Vérification de la soumission du formulaire
    $nameError = validateNotEmpty($_POST['name'], 'nom') ?: validateUsername($_POST['name']); // Validation du nom
    $emailError = validateNotEmpty($_POST['email'], 'email') ?: validateEmail($_POST['email']); // Validation de l'email
    $passwordError = validateNotEmpty($_POST['password'], 'mot de passe') ?: validatePassword($_POST['password']); // Validation du mot de passe

    if ($nameError || $emailError || $passwordError) { // Si une erreur est survenue
        $_SESSION['flash']['danger'] = $nameError ?: ($emailError ?: $passwordError); // Enregistrement du message d'erreur dans la session
        header('Location: ../user/register'); // Redirection vers la page d'inscription
        exit; // Arrêt du script
    }

    $userExistsError = validateUserExists($_POST['email']); // Validation de l'existence de l'utilisateur
    if ($userExistsError) { // Si une erreur est survenue
        $_SESSION['flash']['danger'] = $userExistsError; // Enregistrement du message d'erreur dans la session
        header('Location: ../user/register'); // Redirection vers la page d'inscription
        exit; // Arrêt du script
    }

    $userId = createUser($_POST['name'], $_POST['email'], $_POST['password'], $_POST['niveauMagie']); // Création de l'utilisateur
    if ($userId) { // Si l'utilisateur est créé
        $_SESSION['profil'] = ['nom' => $_POST['name'], 'email' => $_POST['email'], 'idutilisateur' => $userId['userId'], 'roles' => [$userId['roleLevel']]]; // Enregistrement des informations de l'utilisateur dans la session
        $_SESSION['flash']['success'] = "Bienvenue " . $_POST['name'] . " !"; // Enregistrement du message de succès dans la session
        header('Location: ../user/profil'); // Redirection vers la page de profil
        exit; // Arrêt du script
    } else {
        $_SESSION['flash']['danger'] = "Une erreur s'est produite lors de l'inscription."; // Enregistrement du message d'erreur dans la session
        header('Location: ../user/register'); // Redirection vers la page d'inscription
        exit; // Arrêt du script
    }
}



