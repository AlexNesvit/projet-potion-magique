<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Récupération du nom de la page actuelle
?>
<?php if ($currentPage === 'profil.php' || $currentPage === 'login.php' || $currentPage === 'register.php') : ?> <!-- Vérification de la page actuelle pour ajouter la classe active -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">Espace Membre</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Accueil</a>
          </li>
          <?php if (isset($_SESSION['profil'])) : ?> <!-- Vérification de la connexion de l'utilisateur pour afficher le menu -->
            <li class="nav-item">
              <a class="nav-link" href="profil">Profil</a>
            </li>
            <?php if (in_array('ROLE_ADMIN', $_SESSION['profil']['roles'])) : ?> <!-- Vérification du rôle de l'utilisateur pour afficher le menu d'administration -->
              <li class="nav-item">
                <a class="nav-link" href="../admin/admin">Administration</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="../controllers/logout.php">Déconnexion</a>
            </li>
          <?php else : ?> <!--  Sinon afficher le menu de connexion et d'inscription -->
            <li class="nav-item">
              <a class="nav-link" href="register">S'inscrire</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login">Connexion</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
<?php elseif ($currentPage === 'admin.php') : ?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">Espace Membre</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Accueil</a>
          </li>
          <?php if (isset($_SESSION['profil'])) : ?> <!-- Vérification de la connexion de l'utilisateur pour afficher le menu -->
            <li class="nav-item">
              <a class="nav-link" href="../user/profil">Profil</a>
            </li>
            <?php if (in_array('ROLE_ADMIN', $_SESSION['profil']['roles'])) : ?> <!-- Vérification du rôle de l'utilisateur pour afficher le menu d'administration -->
              <li class="nav-item">
                <a class="nav-link" href="admin">Administration</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="../controllers/logout.php">Déconnexion</a>
            </li>
          <?php else : ?> <!--  Sinon afficher le menu de connexion et d'inscription -->
            <li class="nav-item">
              <a class="nav-link" href="../user/register">S'inscrire</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../user/login">Connexion</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
<?php else : ?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Espace Membre</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <?php if (isset($_SESSION['profil'])) : ?> <!-- Vérification de la connexion de l'utilisateur pour afficher le menu -->
            <li class="nav-item">
              <a class="nav-link" href="user/profil">Profil</a>
            </li>
            <?php if (in_array('ROLE_ADMIN', $_SESSION['profil']['roles'])) : ?> <!-- Vérification du rôle de l'utilisateur pour afficher le menu d'administration -->
              <li class="nav-item">
                <a class="nav-link" href="admin/admin">Administration</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="controllers/logout.php">Déconnexion</a>
            </li>
          <?php else : ?> <!--  Sinon afficher le menu de connexion et d'inscription -->
            <li class="nav-item">
              <a class="nav-link" href="user/register">S'inscrire</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user/login">Connexion</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
<?php endif; ?>