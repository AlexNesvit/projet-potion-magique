<?php
session_start(); // Démarrage de la session
$title = 'Inscription'; // Déclaration du titre de la page
require '../../config/db.php'; // Inclusion du fichier de connexion à la base de données
require '../../core/functions.php'; // Inclusion du fichier de fonctions
include '../partials/head.php'; // Inclusion du fichier d'en-tête
include '../partials/menu.php'; // Inclusion du fichier de menu
?>
<div class="row mt-5">
    <div class="col-lg-4 col-md-6 col-10 bg-light m-auto border border-1 rounded shadow p-3">
    <h1 class="mt-3 mb-4 text-center h3">Formulaire d'inscription</h1>
    <?php displayMessage(); ?>
        <form method="POST" action="../controllers/addUser.php">
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Username</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" >
            </div>
            <div class="mb-3">
            <?php displayMagicalNiveau(); ?>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-dark px-3 py-2">S'inscrire</button>
            </div>
            
        </form>
    </div>
</div>
    
<?php
include '../partials/footer.php';

