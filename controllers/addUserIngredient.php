<?php
session_start();
require_once '../config/db.php'; // Inclure le fichier de configuration de la base de données
require_once '../core/functions.php'; // Inclure le fichier de fonctions

if (isset($_POST['submitIngredient'])) {
    $nameError = validateNotEmpty($_POST['nomIngredient'], 'nom') ?: validateIngredientName($_POST['nomIngredient']); // Validation du nom de l'ingrédient
    $proprieteError = validateNotEmpty($_POST['proprieteIngredient'], 'propriete') ?: validateIngredientPropriete($_POST['proprieteIngredient']); // Validation de la propriété
    $typeError = validateNotEmpty($_POST['typeIngredient'], 'type'); // Validation du type
    $rareteError = validateNotEmpty($_POST['rareteIngredient'], 'rarete'); // Validation de la rareté

    if ($nameError || $proprieteError || $typeError || $rareteError) { // Si une erreur est survenue
        $_SESSION['flash']['danger'] = $nameError ?: ($proprieteError ?: ($typeError ?: $rareteError)); // Enregistrement du message d'erreur dans la session
        header('Location: ../user/profil'); // Redirection vers la page de profil
        exit; // Arrêt du script
    }

    $ingredientExistsError = validateIngredientExists($_POST['nomIngredient']); // Validation de l'existence de l'ingrédient
    if ($ingredientExistsError) { // Si une erreur est survenue
        $_SESSION['flash']['danger'] = $ingredientExistsError; // Enregistrement du message d'erreur dans la session
        header('Location: ../user/profil'); // Redirection vers la page de profil
        exit; // Arrêt du script
    }else{
        $ingredientId = addIngredient($_POST['nomIngredient'], $_POST['proprieteIngredient'], $_POST['typeIngredient'], $_POST['rareteIngredient']); // Création de l'ingrédient
        if ($ingredientId) { // Si l'ingrédient est créé
            $_SESSION['flash']['success'] = "L'ingrédient " . $_POST['nomIngredient'] . " a bien été ajouté !"; // Enregistrement du message de succès dans la session
            header('Location: ../user/profil'); // Redirection vers la page de profil
            exit; // Arrêt du script
        } else {
            $_SESSION['flash']['danger'] = "Une erreur s'est produite lors de l'ajout de l'ingrédient."; // Enregistrement du message d'erreur dans la session
            header('Location: ../user/profil'); // Redirection vers la page de profil
            exit; // Arrêt du script
        }
    }

}
