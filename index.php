<?php
require_once 'header.php';
require_once 'bdd.php';
?>

<?php
// Message de bienvenue si utilisateur connecté
if (isset($_SESSION['user_name'])) {
  echo "<p class='success' style='text-align: center;'>Bienvenue " . htmlspecialchars($_SESSION['user_name']) . " ! Vous êtes connecté.</p>";
}

// 🔹 Récupérer toutes les ligues et leur club le plus titré
$stmt = $pdo->query("
  SELECT 
    l.id_ligue, l.nom_ligue, l.logo AS logo_ligue,
    c.id_club, c.name AS club_name, c.logo AS club_logo
  FROM ligues l
  LEFT JOIN clubs c ON c.id_ligue = l.id_ligue
  AND c.vedette = 1
  ORDER BY l.id_ligue ASC
");
$ligues = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
  <section>
    <?php foreach ($ligues as $ligue): ?>
      <div>
        <!-- Logo de la ligue -->
        <a href="ligue.php?id_ligue=<?= $ligue['id_ligue']; ?>">
          <img src="<?= htmlspecialchars($ligue['logo_ligue']); ?>" width="50" alt="<?= htmlspecialchars($ligue['nom_ligue']); ?>" />
        </a>

        <!-- Logo du club le plus populaire -->
        <?php if (!empty($ligue['id_club'])): ?>
          <a href="clubs/club.php?id=<?= $ligue['id_club']; ?>">
            <img class="petit-logo"
              src="<?= htmlspecialchars($ligue['club_logo']); ?>"
              width="50"
              alt="<?= htmlspecialchars($ligue['club_name']); ?>" />
          </a>
        <?php else: ?>
          <a href="#">
            <img class="petit-logo" src="Logos/Logo E/default.png" width="50" alt="Aucun club" />
          </a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </section>
</main>

<?php require_once 'footer.php'; ?>