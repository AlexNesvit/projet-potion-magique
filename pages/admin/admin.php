<?php
session_start(); // Démarrage de la session
$title = 'Admin'; // Déclaration du titre de la page
require '../../core/functions.php'; // Inclusion du fichier de fonctions
require '../../config/db.php'; // Inclusion du fichier de connexion à la base de données
$user = $_SESSION['profil']; // Récupération des données de l'utilisateur
logedIn(); // Appel de la fonction de connexion
include '../partials/head.php'; // Inclusion du fichier d'en-tête
include '../partials/menu.php'; // Inclusion du fichier du menu d'administration
?>

<div class="container-fluid text-center">
    <div class="row">
        <div class="col-6 m-auto">
        <h1 class="my-3">Bonjour Administrateur <?= $user['nom'] ?></h1>
        <?php displayMessage(); // Appel de la fonction pour afficher les messages $_SESSION['flash'] ?>
        </div>
    </div>
    <div class="row">
        <div class="text-start col-6 m-auto">
            
            <pre>id user : <?= $user['idutilisateur'] ?></pre>
            <p>Mon email: <?= $user['email'] ?></p>
            <a class="btn btn-danger" href="../controllers/logout.php">déconnexion</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-6 m-auto list p-3 mt-3 border-bottom border-top border-success-subtle border-5">
            <h2 class="fs-3">Liste des utilisateurs par le dernier utilisateur inscrit</h2>
            <?php displayUsersAdmin(); // Appel de la fonction pour afficher les utilisateurs ?>
        </div>
    </div>
</div>

<?php
include '../partials/footer.php'; // Inclusion du fichier de pied de page