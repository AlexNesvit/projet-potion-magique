  <?php
  session_start(); // Démarrage de la session
  $title = 'Profil'; // Déclaration du titre de la page
  require '../../core/functions.php'; // Inclusion du fichier de fonctions
  require '../../config/db.php'; // Inclusion du fichier de configuration de la base de données
  $user = $_SESSION['profil']; // Récupération des données de l'utilisateur
  $roles = $_SESSION['profil']['roles'];  // Récupération des rôles de l'utilisateur
  logedIn(); // Appel de la fonction de connexion
  include '../partials/head.php'; // Inclusion du fichier d'en-tête
  include '../partials/menu.php'; // Inclusion du fichier de navigation
  ?>

  <!-- Inclusion page -->
  <div class="container-fluid pt-5 px-5 bg-dark">
    <div class="row">
      <!-- Colonne de profil -->
      <div class="col-md-3">
        <div class="card">
          <img src="../images/veste-cuir-figure-robe-mode_1409-6103.jpg" class="card-img-top" alt="Photo de profil">
          <div class="card-body">
            <p class="card-title h5 fw-bold">Bonjour <?= $user['nom'] ?></p>
            <p class="card-text">Mon email: <?= $user['email'] ?></p>
            <pre>id user : <?= $user['idutilisateur'] ?></pre>
            <p class="fs-3">Mes rôles : </br>
              <?php foreach ($roles as $role) : ?>
            <p><?= $role ?></p>
          <?php endforeach; ?>
          </p>
          <a href="#" class="btn btn-primary">Modifier le profil</a>
          <a class="btn btn-danger" href="../controllers/logout.php">déconnexion</a>
          </div>
        </div>
      </div>
      <!-- Colonne de contenu -->
      <div class="col-md-9">
        <h1 class="card-title h3 mb-3 text-light">🧙‍♂️ Bienvenue sur votre page de profil 🧙‍♂️</h1>
        <p class="card-text mb-3 text-light">Vous pouvez consulter vos informations personnelles, modifier votre profil et consulter la liste des potions que vous avez créées.</p>
        <div class="card">
          <?php displayMessage(); ?>
          <div class="card-body">
            <h2 class="card-title h4">🧪 Créer une potion ⚗️</h2>
            <p class="card-title">Avant de créer une potion, vérifiez la disponibilité des ingrédients ainsi que des effets</p>
            <div class="row">
              <div class="col-12 col-md-6">
                <h3 class="h4">Liste des effets</h3>
                <div class="list-add">
                  <?php displayEffets(); ?>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <h3 class="h4">Liste des ingrédients</h3>
                <div class="list-add">
                  <?php displayIngredients(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3 ">
          <div class="col-md-6">
            <div class="card mt-3">
              <div class="card-body">
                <div class="form-add">
                  <h3 class="h4">Ajouter un nouvel effet 🌀⚡💥🤯💨🌪️</h3>
                  <form action="../controllers/addUserEffet.php" method="post">
                    <div class="mb-3">
                      <label for="nomEffet" class="form-label">Nom de l'effet:</label>
                      <input type="text" class="form-control" id="nomEffet" name="nomEffet" required>
                    </div>
                    <div class="mb-3">
                      <label for="descriptionEffet" class="form-label">Description:</label>
                      <textarea class="form-control" id="descriptionEffet" name="descriptionEffet" required></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="dureeEffet" class="form-label">Durée:</label>
                      <input type="number" class="form-control" id="dureeEffet" name="dureeEffet" required>
                      <label for="uniteDureeEffet" class="form-label">unité de temps</label>
                      <select name="uniteDureeEffet" id="uniteDureeEffet">
                        <option value="secondes">Secondes</option>
                        <option value="min">Minutes</option>
                        <option value="Heures">Heures</option>
                        <option value="jours">Jours</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submitEffet">Ajouter l'effet</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mt-3">
              <div class="card-body">
                <div class="form-add">
                  <h3>Ajouter un nouvel ingrédient 🫐🍌🦍🍄🦄🐉</h3>
                  <form action="../controllers/addUserIngredient.php" method="post">
                    <div class="mb-3">
                      <label for="nomIngredient" class="form-label">Nom de l'ingrédient:</label>
                      <input type="text" class="form-control" id="nomIngredient" name="nomIngredient" required>
                    </div>
                    <div class="mb-3">
                      <label for="proprieteIngredient" class="form-label">Propriété:</label>
                      <textarea class="form-control" id="proprieteIngredient" name="proprieteIngredient" required></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="typeIngredient" class="form-label">Type:</label>
                      <select name="typeIngredient" id="typeIngredient">
                        <option value="liquide">Liquide</option>
                        <option value="solide">Solide</option>
                        <option value="gazeux">Gazeux</option>
                      </select>
                    </div>
                    <div class="mb-3">

                      <label for="rareteIngredient" class="form-label">Rareté:</label>
                      <select name="rareteIngredient" id="rareteIngredient">
                        <option value="commun">Commun</option>
                        <option value="rare">Rare</option>
                        <option value="epique">Epique</option>
                        <option value="legendaire">Légendaire</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submitIngredient">Ajouter l'ingrédient</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <h3 class="text-center h2">Ajouter une nouvelle potion</h3>
            <form action="../controllers/addUserPotion.php" method="post">
              <div class="mb-3">
                <label for="nomPotion" class="form-label">Nom de la potion :</label>
                <input type="text" class="form-control" id="nomPotion" name="nomPotion" required>
              </div>
              <div class="mb-3">
                      <label for="niveauMagie" class="form-label">Niveau de magie requis</label>
                      <select name="niveauMagie" id="niveauMagie">
                        <?php displayOptionNiveauMagie(); ?>
                      </select>
                    </div>
              <div class="mb-3">
                <label for="descriptionPotion" class="form-label">Description :</label>
                <textarea class="form-control" id="descriptionPotion" name="descriptionPotion" required></textarea>
              </div>
              <div class="mb-3">
                <label for="dureePotion" class="form-label">Temps de Préparation :</label>
                <input type="number" class="form-control" id="dureePotion" name="dureePotion" required>
                <label for="uniteDureePotion" class="form-label mt-3">unité de temps</label>
                <select name="uniteDureePotion" id="uniteDureePotion">
                  <option value="Minutes">Minutes</option>
                  <option value="Heures">Heures</option>
                </select>
              </div>
              <div id="effetsExistants" class="mb-3">
                <div class="effetsExistant mb-3">
                  <label for="effetsExistant" class="form-label h4">Ajouter un effet</label>
                  <select name="effetsExistant[]" class="form-select">
                    <?php displayOptionEffets(); ?>
                    <!-- Les options doivent être générées dynamiquement à partir de la base de données -->
                  </select>
                </div>
              </div>
              <button type="button" class="btn btn-secondary mb-3 fw-bold" onclick="ajouterEffetExistant()"> + effet</button><br>
              <div id="ingredientsExistants" class="mb-3">
                <div class="ingredientExistant mb-3">
                  <label for="ingredientExistant" class="form-label h4">Ajouter Ingrédient</label>
                  <select name="ingredientsExistant[]" class="form-select">
                    <?php displayOptionIngredients(); ?>
                    <!-- Les options doivent être générées dynamiquement à partir de la base de données -->
                  </select>

                  <label for="quantiteExistant" class="form-label">Quantité:</label>
                  <input type="number" name="quantiteExistant[]" class="form-control">

                  <label for="uniteMesureExistant" class="form-label">Unité de mesure:</label>
                  <select name="uniteMesureExistant[]" class="form-select">
                    <?php displayOptionUniteMesure(); ?>
                    <!-- Les unités de mesure doivent être générées dynamiquement à partir de la base de données -->
                  </select>
                </div>
              </div>

              <button type="button" class="btn btn-secondary mb-3 fw-bold" onclick="ajouterIngredientExistant()"> + ingrédient</button><br>

              <div id="etapesPreparation" class="mb-3">
                <h4>Etape de préparation</h4>
                <div class="etapePreparation mb-3">

                  <label for="numeroEtape" class="form-label">Étape:</label>
                  <span class="numeroEtape">1</span>
                  <input type="hidden" name="numeroEtape[]" value="1">

                  <label for="descriptionEtape" class="form-label">Description de l'étape:</label>
                  <textarea name="descriptionEtape[]" class="form-control" required></textarea>

                  <label for="dureeEstimee" class="form-label">Durée estimée:</label>
                  <input type="number" class="form-control" name="dureeEstimee[]" class="form-control" required>
                 
                  <label for="uniteDureeEstimee" class="form-label">unité de temps</label>
                  <select name="uniteDureeEstimee[]" id="uniteDureeEstimee">
                    <option value="Minutes">Minutes</option>
                    <option value="Heures">Heures</option>
                  </select>
                </div>
                
              </div>
              <button type="button" class="btn btn-secondary mb-3 fw-bold" onclick="ajouterEtapePreparation()">+ étape</button><br>

              <button type="submit" class="btn btn-primary fw-bold" name="submit">🪄 Ajouter la potion 🧪</button>
            </form>
          </div>
        </div>
      </div>
      <script src="../assets/js/potion.js"></script>
      <?php
      include '../partials/footer.php'; // Inclusion du fichier de pied de page