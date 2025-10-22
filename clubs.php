<?php
require_once 'bdd.php';
$clubs = $pdo->query("SELECT * FROM clubs")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Clubs Européens</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Les Clubs Européens</h1>
  <div class="clubs-container">
    <?php foreach ($clubs as $club): ?>
      <div class="club-card">
        <a href="club.php?id=<?= $club['id_club'] ?>">
          <img src="<?= $club['logo'] ?>" alt="<?= $club['nom_club'] ?>">
          <h3><?= $club['nom_club'] ?></h3>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>
