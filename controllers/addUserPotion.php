<?php
session_start();
require_once '../config/db.php'; // Inclure le fichier de configuration de la base de données
require_once '../core/functions.php'; // Inclure le fichier de fonctions
$userid = $_SESSION['profil']['idutilisateur']; // Récupération des données de l'utilisateur
if (isset($_POST['submit'])) {
    // Extraction des données du formulaire
    $nomPotion = $_POST['nomPotion'];
    $niveauMagie = $_POST['niveauMagie'];
    $descriptionPotion = $_POST['descriptionPotion'];
    $dureePotion = $_POST['dureePotion'];
    $uniteDureePotion = $_POST['uniteDureePotion'];

    // Insertion de la potion dans la base de données
    $stmt = $pdo->prepare("INSERT INTO potionMagique (nom, description, tempsPreparation,utilisateur_idutilisateur, niveauMagie_idniveauMagie) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nomPotion, $descriptionPotion, $dureePotion . ' ' . $uniteDureePotion,$userid, $niveauMagie]);
    $potionId = $pdo->lastInsertId();

    // Gestion des ingrédients existants
    if (isset($_POST['ingredientsExistant'])) {
        $quantitesExistants = $_POST['quantiteExistant'];
        $unitesMesureExistants = $_POST['uniteMesureExistant'];
        foreach ($_POST['ingredientsExistant'] as $index => $idingredient) {
            $quantite = $quantitesExistants[$index];
            $uniteMesure = $unitesMesureExistants[$index];
            $stmt = $pdo->prepare("INSERT INTO potionMagique_has_ingredient (potionMagique_idpotionMagique, ingredient_idingredient, quantite, uniteMesure_iduniteMesure) VALUES (?, ?, ?, ?)");
            $stmt->execute([$potionId, $idingredient, $quantite, $uniteMesure]);
        }
    }

    // Gestion des effets
    if (isset($_POST['effetsExistant'])) {
        foreach ($_POST['effetsExistant'] as $ideffet) {
            $stmt = $pdo->prepare("INSERT INTO potionMagique_has_effet (potionMagique_idpotionMagique, effet_ideffet) VALUES (?, ?)");
            $stmt->execute([$potionId, $ideffet]);
        }
    }

    // Gestion des étapes de préparation
    $descriptionsEtape = $_POST['descriptionEtape'];
    $dureesEstimee = $_POST['dureeEstimee'];
    $unitesDureeEstimee = $_POST['uniteDureeEstimee'];
    $numeroEtapeEstime = $_POST['numeroEtape'];
    foreach ($descriptionsEtape as $index => $description) {
        $duree = $dureesEstimee[$index];
        $uniteDuree = $unitesDureeEstimee[$index];
        $numeroEtape = $numeroEtapeEstime[$index];
        $stmt = $pdo->prepare("INSERT INTO etapeDePreparation (numeroEtape,description, dureeEstime, potionMagique_idpotionMagique) VALUES (?, ?, ?, ?)");
        $stmt->execute([$numeroEtape, $description, $duree . ' ' . $uniteDuree, $potionId]);
    }

    $_SESSION['flash']['success'] = 'Potion ajoutée avec succès';
    header('Location: ../user/profil');
}