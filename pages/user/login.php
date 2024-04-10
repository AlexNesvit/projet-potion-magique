<?php
session_start(); // Démarrage de la session
$title = 'Connexion'; // Déclaration du titre de la page
require '../../core/functions.php'; // Inclusion du fichier de fonctions
include '../partials/head.php';
include '../partials/menu.php';
?>
<div class="row mt-5">
    <div class="col-lg-4 col-md-6 col-10 bg-light m-auto border border-1 rounded shadow p-3">
    <h1 class="mt-3 mb-4 h3 text-center">Formulaire de connexion</h1>
    <?php displayMessage(); ?>
        <form method="POST" action="../controllers/logUser.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" name="submit" class="btn btn-dark">
        </form>
    </div>
</div>
    
<?php
include '../partials/footer.php';

