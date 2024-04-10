<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Récupération du nom de la page actuelle
?>
<?php if ($currentPage === 'index.php') : ?> <!-- Vérification de la page actuelle pour ajouter le titre -->
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="assets/js/main.js"></script>
<?php else :?>
<script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="../assets/js/main.js"></script>
<?php endif; ?>
</body>
</html>