<?php

require_once 'bdd.php';
$pageName = 'pages-ligue';
require_once 'header.php';

// Recupérer le paramètre ?id= dans url si existe pas alors redirigé page accueil
if (!isset($_GET['id'])) {
      header("Location: index.php");
      exit();
}

$id_ligue = intval($_GET['id']);

// Récupération des données concernant la ligue
$stmt = $pdo->prepare("SELECT * FROM ligues WHERE id = :id_ligue");
$stmt->bindParam(':id_ligue', $id_ligue);
$stmt->execute();
$ligue = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$ligue) {
      echo "Ligue non trouvée.";
}

// Utilisation de $pdo pour récupérer les information de la table clubs ou id_ligue = $id_ligue
$stmt = $pdo->prepare("SELECT * FROM clubs WHERE id_ligue = :id_ligue");
$stmt->bindParam(':id_ligue', $id_ligue);
$stmt->execute();
$clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$clubs) {
      echo "Aucun club trouvé pour cette ligue.";
}
?>



<h1><?php echo htmlspecialchars($ligue['name']); ?></h1>
<p><?php echo htmlspecialchars($ligue['description']); ?></p>

<?php if ($id_ligue == 1): // Ligue 1 
?>
      <h2>Championnat <?php echo htmlspecialchars($ligue['name']); ?> en cours</h2>
      <p>Le championnat de Ligue 1 est actuellement en cours. Consultez les dernières nouvelles et résultats sur notre site officiel.</p>



<?php elseif ($id_ligue == 2): // Ligue A 
?>
      <h2>Championnat <?php echo htmlspecialchars($ligue['name']); ?> en cours</h2>
      <p>Le championnat de Ligue A est actuellement en cours. Consultez les dernières nouvelles et résultats sur notre site officiel.</p>
      <p>Les meilleurs ligue A sont Mahmloud et Valentin.....</p>



<?php elseif ($id_ligue == 3): // Serie A ?>
      <h2>Championnat <?php echo htmlspecialchars($ligue['name']); ?> en cours</h2>
      <p>Le championnat de Serie A est actuellement en cours. Consultez les dernières nouvelles et résultats sur notre site officiel.</p>
      <p>Les meilleurs Serie A sont Rossi et Bianchi.....</p>


<?php elseif ($id_ligue == 4): // Premier League ?>
      <h2>Championnat <?php echo htmlspecialchars($ligue['name']); ?>en cours</h2>
      <p>Le championnat de Premier League est actuellement en cours. Consultez les dernières nouvelles et résultats sur notre site officiel.</p>
<?php endif; ?>



<h2>Les 10 meilleurs clubs de cette ligue</h2>

<ul>
      <?php foreach ($clubs as $club): ?>
            <li>
                  <a href="/clubs/<?php echo htmlspecialchars($club['fichier_php_name']); ?>.php">
                        <h3><?php echo htmlspecialchars($club['nom_club']); ?></h3>
                        <p><?php echo htmlspecialchars($club['description']); ?></p>
                        <img src="/clubs/logos/<?php echo htmlspecialchars($club['fichier_php_name']); ?>.webp" width="100">
                  </a>
            </li>
      <?php endforeach; ?>
</ul>

<?php require_once 'footer.php'; ?>