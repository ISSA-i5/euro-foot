<?php require_once 'header.php'; ?>

<?php
  // Si existe variable sessin email alors on affiche un message de bienvenue

  // Afficher les variables de session pour le débogage
  // echo '<pre>';
  // print_r($_SESSION);
  // echo '</pre>';
  if (isset($_SESSION['user_name'])) {
    echo "<p class='success' style='text-align: center;'>Bienvenue " . htmlspecialchars($_SESSION['user_name']) . " ! Vous êtes connecté.</p>";
  }

?>

<main>
  <section>
    <div>
      <a href="Ligue_1.php">
        <img src="./Logos/league/Ligue1 F.png" width="50" alt="Ligue 1" />
      </a>
      <a href="PSG.php">
        <img class="petit-logo" src="./Logos/Logo E/psg.webp" width="50" alt="PSG" />
      </a>
    </div>

    <div>
      <a href="Laliga.php">
        <img src="./Logos/league/Laliga.webp" width="50" alt="Laliga" />
      </a>
      <a href="Real_Madrid.php">
        <img class="petit-logo" src="./Logos/Logo E/RM 2.png" width="50" alt="Real Madrid" />
      </a>
    </div>

    <div>
      <a href="Serie_A.php">
        <img src="./Logos/league/Serie A.png" width="50" alt="Serie A" />
      </a>
      <a href="Juventus.php">
        <img class="petit-logo" src="./Logos/Logo E/JV-3.png" width="50" alt="Juventus" />
      </a>
    </div>

    <div>
      <a href="Premier_League.php">
        <img src="./Logos/league/P League E.png" width="50" alt="Premier League" />
      </a>
      <a href="Liverpool.php">
        <img class="petit-logo" src="./Logos/Logo E/L.Pool.png" width="50" alt="Liverpool" />
      </a>
    </div>
  </section>
</main>

<?php require_once 'footer.php'; ?>