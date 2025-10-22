<?php require_once 'header.php'; ?>

<?php
  // Si existe variable sessin email alors on affiche un message de bienvenue

  // Afficher les variables de session pour le débogage
  // echo '<pre>';
  // print_r($_SESSION);
  // echo '</pre>';
  // if (isset($_SESSION['user_name'])) {
  //   echo "<p class='success' style='text-align: center;'>Bienvenue " . htmlspecialchars($_SESSION['user_name']) . " ! Vous êtes connecté.</p>";
  // }

?>

<main>
  <section>
    <div>
      <a href="ligue.php?id=1">
        <img src="./Logos/league/Ligue1 F.png" width="50" alt="Ligue 1" />
      </a>
      <a href="/clubs/Psg.php">
        <img class="petit-logo" src="./Logos/Logo E/psg.webp" width="50" alt="PSG" />
      </a>
    </div>

    <div>
      <a href="ligue.php?id=2">
        <img src="./Logos/league/Laliga.webp" width="50" alt="Laliga" />
      </a>
      <a href="Real_Madrid.php">
        <img class="petit-logo" src="./Logos/Logo E/RM 2.png" width="50" alt="Real Madrid" />
      </a>
    </div>

    <div>
      <a href="ligue.php?id=3">
        <img src="./Logos/league/Serie A.png" width="50" alt="Serie A" />
      </a>
      <a href="Juventus.php">
        <img class="petit-logo" src="./Logos/Logo E/JV-3.png" width="50" alt="Juventus" />
      </a>
    </div>

    <div>
      <a href="ligue.php?id=4">
        <img src="./Logos/league/P League E.png" width="50" alt="Premier League" />
      </a>
      <a href="Liverpool.php">
        <img class="petit-logo" src="./Logos/Logo E/L.Pool.png" width="50" alt="Liverpool" />
      </a>
    </div>
  </section>
</main>


<?php require_once 'footer.php'; ?>