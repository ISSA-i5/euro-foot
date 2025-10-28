<?php
require_once '../header.php';
require_once '../bdd.php';

// Vérifie si un ID de club est passé dans l'URL
if (isset($_GET['id'])) {
    $id_club = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM clubs WHERE id_club = ?");
    $stmt->execute([$id_club]);
    $club = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Si aucun club trouvé
if (!$club) {
    echo "<p style='text-align:center;color:red;'>Club non trouvé.</p>";
    require_once '../footer.php';
    exit;
}
?>

<main class="club-page">
  <div class="club-card">

    <?php if (!empty($club['logo'])): ?>
      <div class="club-logo-wrapper">
        <img src="../<?= htmlspecialchars($club['logo']); ?>" alt="<?= htmlspecialchars($club['name']); ?>" class="club-logo">
      </div>
    <?php endif; ?>

    <h1 class="club-title"><?= htmlspecialchars($club['name']); ?></h1>

    <p class="club-description"><?= nl2br(htmlspecialchars($club['description'])); ?></p>

    <div class="club-details">
      <p><strong>Pays :</strong> <?= htmlspecialchars($club['pays']); ?></p>
      <p><strong>Titres nationaux :</strong> <?= htmlspecialchars($club['nb_titres_nationaux']); ?></p>
      <p><strong>Titres internationaux :</strong> <?= htmlspecialchars($club['nb_titres_internationaux']); ?></p>
      <p><strong>Joueurs légendaires :</strong></p>
      <p class="club-legends"><?= htmlspecialchars($club['joueurs_legendes']); ?></p>
    </div>

    <?php if (!empty($club['site_officiel'])): ?>
      <a href="<?= htmlspecialchars($club['site_officiel']); ?>" target="_blank" class="btn-site">🌐 Visiter le site officiel</a>
    <?php endif; ?>
  </div>
</main>

<?php require_once '../footer.php'; ?>
