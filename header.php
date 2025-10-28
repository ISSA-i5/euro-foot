<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Détection automatique du chemin (utile pour les sous-dossiers)
$path_prefix = (basename(dirname($_SERVER['PHP_SELF'])) === 'clubs') ? '../' : '';
?>

<!DOCTYPE html>
<html lang="fr" <?php echo isset($pageName) ? "id='$pageName'" : ''; ?>>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Euro Foot</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= $path_prefix ?>favicon.ico" />

  <!-- Polices -->
  <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">

  <!-- Feuilles de style -->
  <link rel="stylesheet" href="<?= $path_prefix ?>reset.css" />
  <link rel="stylesheet" href="<?= $path_prefix ?>styles.css" />
  <link rel="stylesheet" href="<?= $path_prefix ?>formulaire.css" />
</head>

<body>
  <header>
    <!-- Logo -->
    <a href="<?= $path_prefix ?>index.php">
      <img src="<?= $path_prefix ?>Logos/Logos_Mix/logo.png" width="120" alt="Accueil Euro Foot" />
    </a>

    <div>
      <h1>Euro Foot</h1>
      <p>Ligue, équipes et résultats européens en un clic</p>
    </div>

    <!-- Menu mobile -->
    <div class="desktop-display-none">
      <a href="<?= $path_prefix ?>menusT.php" title="Accéder à la page menu">
        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="gold">
          <g stroke="#F5F570" stroke-width="2.5" stroke-linecap="round">
            <path d="M20 7H4M20 12H4M20 17H4" />
          </g>
        </svg>
      </a>
    </div>

    <!-- Navigation -->
    <nav>
      <?php if (!isset($_SESSION['user_name'])) { ?>
        <div>
          <div>
            <a class="mobile-display-none" href="<?= $path_prefix ?>Connexion.php">
              <img src="<?= $path_prefix ?>Logos/Logos_Mix/connexion.png" width="50" alt="Connexion" />
              <span>Connexion</span>
            </a>
          </div>

          <div>
            <a class="mobile-display-none" href="<?= $path_prefix ?>Inscription.php">
              <span id="inscription-id" class="inscription-class">Inscription</span>
            </a>
          </div>
        </div>
      <?php } else { ?>
        <div>
          <span>Bienvenue, <?= htmlspecialchars($_SESSION['user_name']); ?> !</span>
          <a href="<?= $path_prefix ?>deconnexion.php">
            <span>Déconnexion</span>
          </a>
        </div>
      <?php } ?>
    </nav>
  </header>
