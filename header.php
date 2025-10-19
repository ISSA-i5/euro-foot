<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<!DOCTYPE html>
<html lang="fr" <?php echo isset($pageName) ? "id='$pageName'" : ''; ?>>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Euro Foot</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="reset.css" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="formulaire.css" />
</head>

<body>
  <header>

    <!--logo,h1,slogan,login,bienvenue,-->
    <a href="index.php">
      <img src="./Logos/Logos_Mix/logo.png" width="120" alt="Accueil Euro Foot" />
    </a>

    <div>
      <h1>Euro Foot</h1>

      <p>Ligue, équipes et résultats européens en un clic</p>
    </div>

    <div class="desktop-display-none">
      <a href="menus.php" title="Accéder à la page menu">
        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="gold">
          <g stroke="#F5F570" stroke-width="2.5" stroke-linecap="round">
            <path d="M20 7H4M20 12H4M20 17H4" />
          </g>
        </svg>
      </a>
    </div>

    <nav>
    <div>
      <div>
        <a class="mobile-display-none" href="Connexion.php">
          <img src="./Logos/Logos_Mix/connexion.png" width="50" alt="Connexion" />
          <span>Connexion</span>
        </a>
      </div>
    
      <div>
        <a class="mobile-display-none" href="Inscription.php">
          <span>Inscription</span>
        </a>
      </div>
    </div>
    </nav>
  </header>