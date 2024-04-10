
<?php
session_start(); // Démarrage de la session
$title = 'Accueil'; // déclaration du titre de la page
require 'config/db.php'; // Inclusion du fichier de connexion à la base de données
require 'core/functions.php'; // Inclusion du fichier de fonctions
include 'pages/partials/head.php'; // Inclusion du fichier d'en-tête
include 'pages/partials/menu.php'; // Inclusion du fichier du menu
?>

<div class="container-fluid text-center">
    <h1 class="my-3">Bienvenue sur la création de votre espace Membres</h1>
    <?php
    checkLogedOut();// Affichage du message de déconnexion?>
    <div class="row">
        <div class="col-6 m-auto">
        <?php displayMessage(); // Appel de la fonction pour afficher les messages $_SESSION['flash'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6 m-auto list p-3 mt-3 border-bottom border-top border-success-subtle border-5"> 
        <h2 class="fs-3 mb-4">Liste des utilisateurs par le dernier utilisateur inscrit</h2>
            <div class="list-user">
                <?php displayUsers(); ?> <!-- Appel de la fonction pour afficher les utilisateurs -->
            </div> 
        </div>
    </div>
</div>
<?php include 'pages/partials/footer.php'; // Inclusion du fichier de pied de page ?>